<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $loan_type_id = mysqli_real_escape_string($conn, $_POST["loan_type_id"]);
    $loan_status = mysqli_real_escape_string($conn, $_POST["loan_status"]);

    // Update the user's profile image in the database
    $sql = "UPDATE loans SET loan_status = ? WHERE loan_type_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $loan_status, $loan_type_id);
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
