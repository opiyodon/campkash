<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Update the user's profile image in the database
    $sql = "DELETE FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $id);
        if ($stmt->execute()) {
            // Redirect to Home Page
            header('location:' . SITEURL . 'admin_dashboard.php');
            ob_end_flush();
        } else {
            // Redirect to Home Page
            header('location:' . SITEURL . 'admin_dashboard.php');
            ob_end_flush();
        }
        $stmt->close();
    }
} else {
    header('location:' . SITEURL . 'admin_dashboard.php');
}

mysqli_close($conn); // Close the database connection
