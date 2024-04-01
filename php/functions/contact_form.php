<?php
// Include PHPMailer autoloader
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form data
    $email = $_POST["email"];
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Send the email to the user
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

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('ogitadeborah@gmail.com', 'campkash'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Name: " . $name . "<br>Email: " . $email . "<br>Message: " . $message;

        $mail->send();
    } catch (Exception $e) {
        $mail->ErrorInfo;
    }

    // Redirect to homepage
    header("Location: " . SITEURL . "contact.php");
    exit(); // Stop further execution
}
