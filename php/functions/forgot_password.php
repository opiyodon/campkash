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

  // Generate a password reset token
  $reset_token = bin2hex(random_bytes(50)); // This function will generate a 50 character token

  // Store the token in the database
  $sql = "UPDATE users SET reset_token='$reset_token' WHERE email='$email'";
  mysqli_query($conn, $sql);

  // Send the password reset link to the user's email
  $mail = new PHPMailer(true);

  try {
    // SMTP settings for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ogitadeborah@gmail.com'; // SMTP username
    $mail->Password = 'iqdn ldix ahst oneo';       // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('ogitadeborah@gmail.com', 'campkash');
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body = "Click on this link to reset your password: " . SITEURL . "reset_password.php?reset_token=" . $reset_token;

    $mail->send();
  } catch (Exception $e) {
    $mail->ErrorInfo;
  }

  // Redirect to homepage
  header("Location: " . SITEURL . "forgot_password.php");
  exit(); // Stop further execution
}
