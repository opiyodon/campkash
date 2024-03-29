<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form data
    $username = $_POST["username"];
    $password = md5($_POST['password']); // Password encryption with md5
    $isAdminChecked = isset($_POST['admin']); // Check if admin checkbox is checked

    // SQL query to check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User exists, start a new session
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        $admin = $row['admin'] === 'yes'; // Check if the user is an admin
        $_SESSION['user'] = $username;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['admin'] = $admin; // Store the admin status in the session
        $_SESSION['login'] = "<div class='SUCCESS'>Login Successful</div>";

        // Redirect based on admin checkbox and user admin
        if ($isAdminChecked && $admin) {
            // Redirect to the admin dashboard
            header('location:' . SITEURL . 'admin_dashboard.php');
        } else {
            // Redirect to the normal dashboard
            header('location:' . SITEURL . 'dashboard.php');
        }
        ob_end_flush();
        die();
    } else {
        $_SESSION['login'] = "<div class='ERROR'>Invalid Username or Password</div>";
        header('location:' . SITEURL . 'login.php');
        ob_end_flush();
        die();
    }
}

// Close connection
mysqli_close($conn);
