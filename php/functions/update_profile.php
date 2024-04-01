<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $user_id = $_SESSION['user_id'];
    $image_name = "default.jpg"; // Default image value

    // Get the current profile image
    $sql = "SELECT userProfile FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $current_image = $user['userProfile'];
        }
        $stmt->close();
    }

    // Handle image upload if selected
    if (!empty($_FILES['userProfile']['name'])) {
        $image_name = "User-Profile-" . rand(0000, 9999) . "." . pathinfo($_FILES['userProfile']['name'], PATHINFO_EXTENSION);
        $upload = move_uploaded_file($_FILES['userProfile']['tmp_name'], "../../img/userProfile/" . $image_name);

        if (!$upload) {
            header('location:' . SITEURL . 'register.php');
            exit; // Stop the process if image upload fails
        }
    }

    // Update the user's profile image in the database
    $sql = "UPDATE users SET userProfile = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $image_name, $user_id);
        if ($stmt->execute()) {
            // Remove the previous image if it exists and is not the default
            if ($current_image != "" && $current_image != "default.jpg") {
                $remove_path = "../../img/userProfile/" . $current_image;
                if (file_exists($remove_path)) {
                    unlink($remove_path);
                }
            }
            // Redirect to Home Page
            header('location:' . SITEURL . 'dashboard.php');
            ob_end_flush();
        } else {
            // Redirect to Home Page
            header('location:' . SITEURL . 'dashboard.php');
            ob_end_flush();
        }
        $stmt->close();
    }
} else {
    header('location:' . SITEURL . 'register.php');
}

mysqli_close($conn); // Close the database connection
