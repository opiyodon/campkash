<?php
// Include PHPMailer autoloader
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '../config.php'; // Include the database connection file

$mail = new PHPMailer(true);

try {
    // SMTP settings for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ogitadeborah@gmail.com'; // SMTP username
    $mail->Password = 'iqdn ldix ahst oneo';    // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender's email (user's email entered in the contact form)
    $userEmail = $_POST['email'];
    $userName = $_POST['name'];

    // Recipients
    $mail->setFrom($userEmail, $userName);
    $mail->addAddress('ogitadeborah@gmail.com', 'campkash'); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = "Name: " . $userName . "<br>Email: " . $userEmail . "<br>Message: " . $_POST['message'];

    $mail->send();
    $_SESSION['alert'] = ['message' => 'Email sent', 'type' => 'success'];
} catch (Exception $e) {
    $_SESSION['alert'] = ['message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo, 'type' => 'error'];
} finally {
    header("Location: " . SITEURL . "contact.php");
    exit();
}

