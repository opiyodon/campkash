<?php
// Check whether the user is logged in or not
if (!isset($_SESSION['user'])) {
    // User is not logged in
    // Redirect to the Login Page
    header('location:' . SITEURL . 'login.php');
    exit();
}

// Store the user_id from the session for easy access throughout the website
$user_id = $_SESSION['user_id'];

// Retrieve the user role from the database
$stmt = $conn->prepare("SELECT admin FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($admin);
$stmt->fetch();
$_SESSION['role'] = $admin;

$stmt->close();
