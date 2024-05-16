<?php
ini_set("SMTP", "smtp.example.com");
ini_set("smtp_port", "587"); // Port may vary depending on your SMTP server configuration
ini_set("sendmail_from", "mrmasud151821@gmail.com");

$to = "ranammasud100@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent from PHP.";
$headers = "From: sender@example.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}
?>
