<?php
// Load SMTP credentials from Mailtrap
$mailtrapHost = "smtp.mailtrap.io";
$mailtrapPort = 2525; // Check Mailtrap for correct port
$mailtrapUsername = "official@earnnlearn.co.in"; // Replace with your Mailtrap username
$mailtrapPassword = ""; // Replace with your Mailtrap password

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = $mailtrapHost;
    $mail->SMTPAuth = true;
    $mail->Username = $mailtrapUsername;
    $mail->Password = $mailtrapPassword;
    $mail->Port = $mailtrapPort;

    // Email Settings
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.com'); // Replace with your recipient's email
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    $mail->send();
    echo "Email has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
