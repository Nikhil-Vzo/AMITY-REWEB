<?php

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message']; // Fixed typo
$subject = $_POST['subject'];

// sender's email
$email_from = 'lachavzo@gmail.com';

// Email details
$email_subject = "New Form Submission: $subject";
$email_body = "User Name: $name.\n" .
              "User Email: $visitor_email.\n" .
              "User Message: $message.\n";

// Recipient email
$to = "nikhilyadav200530@gmail.com";

// Email headers
$headers = "From: $email_from\r\n";
$headers .= "Reply-To: $visitor_email\r\n";

// check krta hai  inputs ko
if (!empty($name) && filter_var($visitor_email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Process complete hone pe wpis contact page
        header("Location: contact.html");
        exit();
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    echo "Invalid input. Please check your details and try again.";
}
?>
