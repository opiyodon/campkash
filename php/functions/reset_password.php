<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check whether the submit button is clicked or not
    if (isset($_POST['reset_token'])) {
        $reset_token = $_POST['reset_token'];

        // Validate the reset token
        $sql = "SELECT * FROM users WHERE reset_token='$reset_token'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) == 1) {
            // Handle form data
            $new_password = md5($_POST['new_password']); //password encryption with md5
            $row = mysqli_fetch_assoc($res);
            $email = $row['email'];

            // Update the database with the new password
            $sql = "UPDATE users SET password='$new_password', reset_token=NULL WHERE email='$email'";
            mysqli_query($conn, $sql);

            // Redirect to homepage
            header("Location: " . SITEURL . "login.php");
            exit(); // Stop further execution
        } else {
            header('location:' . SITEURL . 'reset_password.php');
            exit();
        }
    } else {
        header('location:' . SITEURL . 'reset_password.php');
        exit();
    }
}

