<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/enquiry-service.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: contact-us.php', true, 302);
    exit;
}

$enquiry = sam_normalize_enquiry($_POST);
$errors = sam_validate_enquiry($enquiry);
$redirect = $enquiry['redirect_to'];

if ($errors) {
    $message = rawurlencode($errors[0]);
    header('Location: ' . $redirect . '?form_status=error&form_message=' . $message . '#contact-form', true, 302);
    exit;
}

try {
    $enquiryId = sam_insert_enquiry($enquiry);
    $delivery = sam_send_enquiry_emails($enquiryId, $enquiry);
} catch (Throwable $exception) {
    error_log('SAM enquiry submission failed: ' . $exception->getMessage());
    $message = rawurlencode('We could not submit your enquiry right now. Please try again or call (888) 202-9831.');
    header('Location: ' . $redirect . '?form_status=error&form_message=' . $message . '#contact-form', true, 302);
    exit;
}

if (!$delivery['internal_sent']) {
    error_log('SAM internal enquiry email failed for enquiry ' . $enquiryId . ': ' . $delivery['internal_error']);
    $message = rawurlencode('Your enquiry was saved, but email delivery is delayed. Please call (888) 202-9831 if your request is urgent.');
    header('Location: ' . $redirect . '?form_status=error&form_message=' . $message . '#contact-form', true, 302);
    exit;
}

header('Location: ' . $redirect . '?form_status=success#contact-form', true, 302);
exit;
