<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

require_once __DIR__ . '/../lib/phpmailer/Exception.php';
require_once __DIR__ . '/../lib/phpmailer/PHPMailer.php';
require_once __DIR__ . '/../lib/phpmailer/SMTP.php';
require_once __DIR__ . '/bootstrap.php';

function sam_clean_text(?string $value): string
{
    return trim((string) $value);
}

function sam_form_redirect_url(array $data): string
{
    $redirect = sam_clean_text($data['redirect_to'] ?? 'contact-us.php');
    if ($redirect === '') {
        $redirect = 'contact-us.php';
    }
    $redirect = preg_replace('#^/+?#', '', $redirect);
    if (!preg_match('/\.php($|\?)/i', $redirect)) {
        $redirect = 'contact-us.php';
    }
    return $redirect;
}

function sam_normalize_enquiry(array $post): array
{
    $firstName = sam_clean_text($post['fname'] ?? $post['first_name'] ?? '');
    $lastName = sam_clean_text($post['lname'] ?? $post['last_name'] ?? '');
    $fullName = sam_clean_text($post['full_name'] ?? '');
    if ($fullName === '') {
        $fullName = trim($firstName . ' ' . $lastName);
    }
    if ($fullName === '' && isset($post['name'])) {
        $fullName = sam_clean_text($post['name']);
    }

    $email = filter_var(sam_clean_text($post['email'] ?? ''), FILTER_VALIDATE_EMAIL) ?: '';

    return [
        'source_page' => sam_clean_text($post['form_source'] ?? 'website'),
        'redirect_to' => sam_form_redirect_url($post),
        'full_name' => $fullName,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => sam_clean_text($post['phone'] ?? ''),
        'inquiry_type' => sam_clean_text($post['inquiry'] ?? $post['inquiry_type'] ?? ''),
        'organization' => sam_clean_text($post['organization'] ?? ''),
        'age' => sam_clean_text($post['age'] ?? ''),
        'injury' => sam_clean_text($post['injury'] ?? ''),
        'message' => sam_clean_text($post['message'] ?? $post['notes'] ?? $post['additional_notes'] ?? ''),
        'honeypot' => sam_clean_text($post['website'] ?? ''),
        'payload' => $post,
    ];
}

function sam_validate_enquiry(array $enquiry): array
{
    $errors = [];
    if ($enquiry['honeypot'] !== '') {
        $errors[] = 'Spam detection triggered.';
    }
    if ($enquiry['full_name'] === '') {
        $errors[] = 'Name is required.';
    }
    if ($enquiry['email'] === '') {
        $errors[] = 'A valid email address is required.';
    }
    if ($enquiry['message'] === '') {
        $errors[] = 'Message is required.';
    }
    return $errors;
}

function sam_insert_enquiry(array $enquiry): int
{
    $pdo = sam_db();
    $stmt = $pdo->prepare(
        'INSERT INTO enquiries (
            source_page, full_name, first_name, last_name, email, phone, inquiry_type,
            organization, age, injury, message, ip_address, user_agent, payload_json, created_at
        ) VALUES (
            :source_page, :full_name, :first_name, :last_name, :email, :phone, :inquiry_type,
            :organization, :age, :injury, :message, :ip_address, :user_agent, :payload_json, :created_at
        )'
    );
    $stmt->execute([
        ':source_page' => $enquiry['source_page'],
        ':full_name' => $enquiry['full_name'],
        ':first_name' => $enquiry['first_name'],
        ':last_name' => $enquiry['last_name'],
        ':email' => $enquiry['email'],
        ':phone' => $enquiry['phone'],
        ':inquiry_type' => $enquiry['inquiry_type'],
        ':organization' => $enquiry['organization'],
        ':age' => $enquiry['age'],
        ':injury' => $enquiry['injury'],
        ':message' => $enquiry['message'],
        ':ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
        ':payload_json' => json_encode($enquiry['payload'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ':created_at' => gmdate('c'),
    ]);

    return (int) $pdo->lastInsertId();
}

function sam_base_mailer(): PHPMailer
{
    $config = sam_config();
    $smtp = $config['smtp'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['username'];
    $mail->Password = $smtp['password'];
    $mail->Port = (int) $smtp['port'];
    $mail->CharSet = 'UTF-8';
    $mail->SMTPSecure = $smtp['secure'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->setFrom($smtp['from_email'], $smtp['from_name']);
    $mail->Sender = $smtp['from_email'];
    $mail->isHTML(true);
    return $mail;
}

function sam_internal_recipients(array $config): array
{
    $recipients = [];
    $candidates = [
        [$config['site']['admin_email'] ?? '', 'SAM Recover Admin'],
        [$config['site']['support_email'] ?? '', $config['site']['support_name'] ?? 'SAM Recover Support'],
    ];

    foreach ($candidates as [$email, $name]) {
        $email = filter_var(trim((string) $email), FILTER_VALIDATE_EMAIL) ?: '';
        if ($email === '') {
            continue;
        }
        $key = strtolower($email);
        if (!isset($recipients[$key])) {
            $recipients[$key] = ['email' => $email, 'name' => (string) $name];
        }
    }

    return array_values($recipients);
}

function sam_customer_mail_html(int $enquiryId, array $enquiry): string
{
    $formattedId = '#' . str_pad((string) $enquiryId, 4, '0', STR_PAD_LEFT);
    $name = sam_h($enquiry['full_name'] !== '' ? $enquiry['full_name'] : 'Customer');

    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You for Contacting Sam Recovery</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#111827;-webkit-text-size-adjust:100%;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f4f6;padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:680px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,0.06);border:1px solid #e5e7eb;">
          
          <!-- Header Banner -->
          <tr>
            <td style="background:#0b0f14;padding:24px 32px;text-align:left;border-bottom:4px solid #c2d500;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                    <img src="https://samrecover.com/samlogo.png" alt="Sam Recovery" style="max-width:140px;height:auto;display:block;">
                  </td>
                  <td align="right" style="color:#9ca3af;font-size:13px;font-weight:600;letter-spacing:0.5px;text-transform:uppercase;">
                    Confirmation Receipt
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Main Content Body -->
          <tr>
            <td style="padding:36px 32px;background:#ffffff;">
              
              <div style="display:inline-block;background:#f7fae8;border:1px solid #e9f1a4;color:#a9bb00;font-size:12px;font-weight:800;letter-spacing:1px;text-transform:uppercase;padding:6px 12px;border-radius:6px;margin-bottom:16px;">
                Enquiry Confirmation
              </div>

              <h1 style="margin:0 0 20px;font-size:24px;font-weight:800;color:#111827;letter-spacing:-0.5px;">Dear {$name},</h1>
              
              <p style="margin:0 0 16px;font-size:15px;line-height:1.7;color:#374151;">
                Thank you for contacting Sam Recovery. We have received your enquiry, and appreciate you reaching out to us.
              </p>

              <p style="margin:0 0 24px;font-size:15px;line-height:1.7;color:#374151;">
                Our team will review your request, and get back within 1-2 business days.
              </p>

              <!-- Highlight Box for Enquiry ID -->
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f8fafc;border-radius:12px;border:1px solid #e5e7eb;padding:16px 20px;margin-bottom:24px;">
                <tr>
                  <td style="font-size:14px;color:#4b5563;">
                    <strong style="color:#111827;">Your Enquiry ID:</strong> 
                    <span style="display:inline-block;background:#c2d500;color:#0b0f14;font-weight:800;font-size:14px;padding:3px 10px;border-radius:6px;margin-left:6px;">{$formattedId}</span>
                  </td>
                </tr>
              </table>

              <p style="margin:0 0 28px;font-size:15px;line-height:1.7;color:#374151;">
                If you need to provide any additional information before we contact you, simply reply to this email.
              </p>

              <p style="margin:0 0 24px;font-size:15px;line-height:1.7;color:#374151;">
                Thank you for choosing Sam Recovery.
              </p>

              <div style="border-top:1px solid #edf2f7;padding-top:20px;margin-top:20px;">
                <p style="margin:0;font-size:15px;font-weight:700;color:#111827;">Best regards,</p>
                <p style="margin:4px 0 0;font-size:15px;font-weight:800;color:#a9bb00;">Sam Recovery team</p>
              </div>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:20px 32px;background:#f9fafb;border-top:1px solid #e5e7eb;text-align:center;font-size:12px;color:#9ca3af;">
              Sam® Sustained Acoustic Medicine &bull; ZetrOZ Systems LLC &bull; Automated System Confirmation
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;
}

function sam_format_page_name(string $page): string
{
    $clean = trim($page);
    if ($clean === '') {
        return 'Contact Us';
    }
    $clean = strtok($clean, '?');
    $map = [
        'contact-us.php' => 'Contact Us',
        'contact-us' => 'Contact Us',
        'faces-of-sam.php' => 'Faces of SAM',
        'faces-of-sam' => 'Faces of SAM',
        'instructional-videos.php' => 'Instructional Videos',
        'instructional-videos' => 'Instructional Videos',
        'education-training.php' => 'Education & Training',
        'education-training' => 'Education & Training',
        'clinical-studies.php' => 'Clinical Studies',
        'clinical-studies' => 'Clinical Studies',
        'patient-resources.php' => 'Patient Resources',
        'patient-resources' => 'Patient Resources',
        'injury-type.php' => 'Injury Type',
        'injury-type' => 'Injury Type',
        'testimonials.php' => 'Testimonials',
        'testimonials' => 'Testimonials',
        'sam-x1-page.php' => 'SAM X1',
        'sam-x1-page' => 'SAM X1',
        'sam-2-0.php' => 'SAM 2.0',
        'sam-2-0' => 'SAM 2.0',
        'sam-3-0.php' => 'SAM 3.0',
        'sam-3-0' => 'SAM 3.0',
        'sam-tech.php' => 'SAM Technology',
        'sam-tech' => 'SAM Technology',
        'sam-treatment.php' => 'SAM Treatment',
        'sam-treatment' => 'SAM Treatment',
        'FAQ.php' => 'FAQ',
        'FAQ' => 'FAQ',
        'Products.php' => 'Products',
        'Products' => 'Products',
        'index.php' => 'Home Page',
        'website' => 'Website',
    ];

    $basename = basename($clean);
    if (isset($map[$basename])) {
        return $map[$basename];
    }
    $noExt = basename($clean, '.php');
    if (isset($map[$noExt])) {
        return $map[$noExt];
    }

    return ucwords(str_replace(['-', '_'], ' ', $noExt));
}

function sam_format_inquiry_type(string $type): string
{
    $clean = trim(strtolower($type));
    if ($clean === '') {
        return 'General Inquiry';
    }
    $map = [
        'patient' => 'I am a Patient',
        'provider' => 'I am a Healthcare Provider',
        'healthcare_provider' => 'I am a Healthcare Provider',
        'sales' => 'Sales Inquiry',
        'support' => 'Technical Support',
        'other' => 'Other',
        'ambassador' => 'SAM Ambassador Program',
    ];

    if (isset($map[$clean])) {
        return $map[$clean];
    }

    return ucwords(str_replace(['-', '_'], ' ', $type));
}

function sam_internal_mail_html(int $enquiryId, array $enquiry): string
{
    $formattedId = '#' . str_pad((string) $enquiryId, 4, '0', STR_PAD_LEFT);
    $pageName = sam_h(sam_format_page_name($enquiry['source_page'] ?? 'contact-us.php'));
    $receivedOn = sam_h(sam_format_enquiry_datetime($enquiry['created_at'] ?? gmdate('c')));

    $fullName = sam_h($enquiry['full_name'] !== '' ? $enquiry['full_name'] : 'N/A');
    $email = sam_h($enquiry['email'] !== '' ? $enquiry['email'] : 'N/A');
    $phone = sam_h($enquiry['phone'] !== '' ? $enquiry['phone'] : 'N/A');
    $inquiryType = sam_h(sam_format_inquiry_type($enquiry['inquiry_type'] ?? ''));
    $message = nl2br(sam_h($enquiry['message'] !== '' ? $enquiry['message'] : 'N/A'));

    $orderRows = [
        'Name' => $fullName,
        'Email Address' => $email,
        'Phone Number' => $phone,
        'Enquiry Type' => $inquiryType,
        'Message' => $message,
        'Source Page' => $pageName,
    ];

    if (!empty($enquiry['organization'])) {
        $orderRows['Organization'] = sam_h($enquiry['organization']);
    }
    if (!empty($enquiry['age'])) {
        $orderRows['Age'] = sam_h($enquiry['age']);
    }
    if (!empty($enquiry['injury'])) {
        $orderRows['Injury'] = sam_h($enquiry['injury']);
    }

    $tableHtml = '';
    foreach ($orderRows as $label => $val) {
        $tableHtml .= '<tr>'
            . '<td style="padding:14px 18px;border-bottom:1px solid #edf2f7;background:#f8fafc;width:32%;font-size:14px;font-weight:700;color:#374151;vertical-align:top;">' . sam_h($label) . '</td>'
            . '<td style="padding:14px 18px;border-bottom:1px solid #edf2f7;background:#ffffff;font-size:14px;line-height:1.6;color:#111827;vertical-align:top;">' . $val . '</td>'
            . '</tr>';
    }

    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Enquiry Received</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#111827;-webkit-text-size-adjust:100%;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f4f6;padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:680px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,0.06);border:1px solid #e5e7eb;">
          
          <!-- Header Banner -->
          <tr>
            <td style="background:#0b0f14;padding:24px 32px;text-align:left;border-bottom:4px solid #c2d500;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                    <img src="https://samrecover.com/samlogo.png" alt="SAM Recover" style="max-width:140px;height:auto;display:block;">
                  </td>
                  <td align="right" style="color:#9ca3af;font-size:13px;font-weight:600;letter-spacing:0.5px;text-transform:uppercase;">
                    Admin Notification
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Top Meta Details -->
          <tr>
            <td style="padding:32px 32px 24px;background:#ffffff;border-bottom:1px solid #f3f4f6;">
              <div style="display:inline-block;background:#f7fae8;border:1px solid #e9f1a4;color:#a9bb00;font-size:12px;font-weight:800;letter-spacing:1px;text-transform:uppercase;padding:6px 12px;border-radius:6px;margin-bottom:12px;">
                Incoming Submission
              </div>
              <h1 style="margin:0 0 16px;font-size:26px;font-weight:800;color:#111827;letter-spacing:-0.5px;">New Enquiry Received</h1>
              
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f8fafc;border-radius:12px;border:1px solid #e5e7eb;padding:16px 20px;">
                <tr>
                  <td style="padding:4px 0;font-size:14px;color:#4b5563;">
                    <strong style="color:#111827;">Enquiry ID:</strong> {$formattedId}
                  </td>
                </tr>
                <tr>
                  <td style="padding:4px 0;font-size:14px;color:#4b5563;">
                    <strong style="color:#111827;">Received On:</strong> {$receivedOn}
                  </td>
                </tr>
                <tr>
                  <td style="padding:4px 0;font-size:14px;color:#4b5563;">
                    <strong style="color:#111827;">Source Page:</strong> {$pageName}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Details Table Header -->
          <tr>
            <td style="padding:24px 32px 12px;background:#ffffff;">
              <h2 style="margin:0;font-size:15px;font-weight:800;text-transform:uppercase;letter-spacing:0.8px;color:#6b7280;">Enquiry Details</h2>
            </td>
          </tr>

          <!-- Main Table -->
          <tr>
            <td style="padding:0 32px 32px;background:#ffffff;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:separate;border-spacing:0;border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;">
                {$tableHtml}
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:20px 32px;background:#f9fafb;border-top:1px solid #e5e7eb;text-align:center;font-size:12px;color:#9ca3af;">
              Sam® Sustained Acoustic Medicine &bull; ZetrOZ Systems LLC &bull; Automated System Notification
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;
}

function sam_send_enquiry_emails(int $enquiryId, array $enquiry): array
{
    $pdo = sam_db();
    $customerSent = 0;
    $internalSent = 0;
    $customerError = '';
    $internalError = '';

    try {
        $customer = sam_base_mailer();
        $customer->addAddress($enquiry['email'], $enquiry['full_name']);
        $customer->addReplyTo(sam_config()['site']['support_email'], sam_config()['site']['support_name']);
        $customer->Subject = 'Thank you for contacting Sam Recovery';
        $customer->Body = sam_customer_mail_html($enquiryId, $enquiry);
        $formattedId = '#' . str_pad((string) $enquiryId, 4, '0', STR_PAD_LEFT);
        $customer->AltBody = "Dear {$enquiry['full_name']},\n\nThank you for contacting Sam Recovery. We have received your enquiry, and appreciate you reaching out to us.\nOur team will review your request, and get back within 1-2 business days.\n\nYour enquiry ID is {$formattedId}.\n\nIf you need to provide any additional information before we contact you, simply reply to this email.\n\nThank you for choosing Sam Recovery.\n\nBest regards,\nSam Recovery team.";
        $customer->send();
        $customerSent = 1;
    } catch (Throwable $exception) {
        $customerError = $exception->getMessage();
    }

    try {
        $internal = sam_base_mailer();
        $config = sam_config();
        $internalRecipients = sam_internal_recipients($config);
        if (!$internalRecipients) {
            throw new RuntimeException('No valid internal notification recipients are configured.');
        }
        foreach ($internalRecipients as $recipient) {
            $internal->addAddress($recipient['email'], $recipient['name']);
        }
        if ($enquiry['email'] !== '') {
            $internal->addReplyTo($enquiry['email'], $enquiry['full_name']);
        } else {
            $internal->addReplyTo($config['site']['support_email'], $config['site']['support_name']);
        }

        $pageName = sam_format_page_name($enquiry['source_page'] ?? 'contact-us.php');
        $formattedId = '#' . str_pad((string) $enquiryId, 4, '0', STR_PAD_LEFT);

        $internal->Subject = "{$formattedId} | New Enquiry Received | {$pageName}";
        $internal->Body = sam_internal_mail_html($enquiryId, $enquiry);
        $internal->AltBody = "New Enquiry Received ({$formattedId}) from {$enquiry['full_name']} on {$pageName}";
        $internal->send();
        $internalSent = 1;
    } catch (Throwable $exception) {
        $internalError = $exception->getMessage();
    }

    $status = ($customerSent || $internalSent) ? 'new' : 'mail_failed';
    $stmt = $pdo->prepare('UPDATE enquiries SET status = :status, customer_mail_sent = :customer_mail_sent, internal_mail_sent = :internal_mail_sent, customer_mail_error = :customer_mail_error, internal_mail_error = :internal_mail_error WHERE id = :id');
    $stmt->execute([
        ':status' => $status,
        ':customer_mail_sent' => $customerSent,
        ':internal_mail_sent' => $internalSent,
        ':customer_mail_error' => $customerError,
        ':internal_mail_error' => $internalError,
        ':id' => $enquiryId,
    ]);

    return [
        'customer_sent' => $customerSent === 1,
        'internal_sent' => $internalSent === 1,
        'customer_error' => $customerError,
        'internal_error' => $internalError,
    ];
}

function sam_fetch_enquiries(): array
{
    $stmt = sam_db()->query('SELECT * FROM enquiries ORDER BY datetime(created_at) DESC, id DESC');
    return $stmt->fetchAll();
}

function sam_admin_timezone(): DateTimeZone
{
    static $timezone = null;

    if ($timezone instanceof DateTimeZone) {
        return $timezone;
    }

    $timezone = new DateTimeZone('America/New_York');
    return $timezone;
}

function sam_format_enquiry_datetime(?string $value): string
{
    if (!$value) {
        return 'No submissions yet';
    }

    try {
        $date = new DateTimeImmutable($value);
        return $date
            ->setTimezone(sam_admin_timezone())
            ->format('M d, Y g:i A T');
    } catch (Throwable $exception) {
        return $value;
    }
}

function sam_archive_enquiry(int $id): void
{
    $stmt = sam_db()->prepare('UPDATE enquiries SET status = :status WHERE id = :id');
    $stmt->execute([
        ':status' => 'archived',
        ':id' => $id,
    ]);
}

function sam_delete_enquiry(int $id): void
{
    $stmt = sam_db()->prepare('DELETE FROM enquiries WHERE id = :id');
    $stmt->execute([
        ':id' => $id,
    ]);
}

function sam_export_enquiries_csv(): void
{
    $rows = sam_fetch_enquiries();

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="sam-enquiries-' . (new DateTimeImmutable('now', sam_admin_timezone()))->format('Y-m-d-His') . '.csv"');

    $output = fopen('php://output', 'wb');
    fputcsv($output, [
        'ID',
        'Created At',
        'Status',
        'Source Page',
        'Full Name',
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Inquiry Type',
        'Organization',
        'Age',
        'Injury',
        'Message',
        'Customer Mail Sent',
        'Internal Mail Sent',
        'Customer Mail Error',
        'Internal Mail Error',
        'IP Address',
        'User Agent',
    ]);

    foreach ($rows as $row) {
        fputcsv($output, [
            $row['id'] ?? '',
            sam_format_enquiry_datetime($row['created_at'] ?? ''),
            $row['status'] ?? '',
            $row['source_page'] ?? '',
            $row['full_name'] ?? '',
            $row['first_name'] ?? '',
            $row['last_name'] ?? '',
            $row['email'] ?? '',
            $row['phone'] ?? '',
            $row['inquiry_type'] ?? '',
            $row['organization'] ?? '',
            $row['age'] ?? '',
            $row['injury'] ?? '',
            $row['message'] ?? '',
            $row['customer_mail_sent'] ?? '',
            $row['internal_mail_sent'] ?? '',
            $row['customer_mail_error'] ?? '',
            $row['internal_mail_error'] ?? '',
            $row['ip_address'] ?? '',
            $row['user_agent'] ?? '',
        ]);
    }

    fclose($output);
}
