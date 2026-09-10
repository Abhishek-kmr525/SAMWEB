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

$enquiryId = sam_insert_enquiry($enquiry);
sam_send_enquiry_emails($enquiryId, $enquiry);

header('Location: ' . $redirect . '?form_status=success#contact-form', true, 302);
exit;
