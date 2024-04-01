<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $user_id = $_SESSION['user_id'];
    $currentPassword = md5($_POST['current_password']); // Encrypt the current password using MD5
    $newPassword = md5($_POST['new_password']); // Encrypt the new password using MD5

    // Check if the current password is correct
    $sql = "SELECT * FROM users WHERE id=? AND password=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("is", $user_id, $currentPassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Update the database with the new password
            $sql = "UPDATE users SET password=? WHERE id=?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("si", $newPassword, $user_id);
                if ($stmt->execute()) {
                    // Redirect to homepage
                    header("Location: " . SITEURL . "admin_dashboard.php");
                    ob_end_flush();
                } else {
                    header('location:' . SITEURL . 'admin_dashboard.php');
                    ob_end_flush();
                }
                $stmt->close();
            }
        } else {
            header('location:' . SITEURL . 'admin_dashboard.php');
            ob_end_flush();
        }
    }
}
