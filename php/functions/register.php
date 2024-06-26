<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $reg_no = mysqli_real_escape_string($conn, $_POST["reg_no"]);
    $phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
    $id_no = mysqli_real_escape_string($conn, $_POST["id_no"]);
    $religion = mysqli_real_escape_string($conn, $_POST["religion"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password'])); // Password encryption with md5
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
    $image_name = "default.jpg"; // Default image value

    // Handle image upload if selected
    if (!empty($_FILES['userProfile']['name'])) {
        $image_name = "User-Profile-" . rand(0000, 9999) . "." . pathinfo($_FILES['userProfile']['name'], PATHINFO_EXTENSION);
        $upload = move_uploaded_file($_FILES['userProfile']['tmp_name'], "../../img/userProfile/" . $image_name);

        if (!$upload) {
            header('location:' . SITEURL . 'register.php');
            exit; // Stop the process if image upload fails
        }
    }

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (fullname, username, userProfile, email, phone_no, id_no, religion, gender, reg_no, dateofbirth, password, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'no')");
    $stmt->bind_param("sssssssssss", $fullname, $username, $image_name, $email, $phone_no, $id_no, $religion, $gender, $reg_no, $dateofbirth, $password);

    // Execute the query and provide feedback
    if ($stmt->execute()) {
        header('location:' . SITEURL . 'login.php');
    } else {
        header('location:' . SITEURL . 'register.php');
    }

    $stmt->close(); // Close statement
} else {
    header('location:' . SITEURL . 'register.php');
}

mysqli_close($conn); // Close the database connection
