<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $reg_no = $_POST["reg_no"];
    $phone_no = $_POST["phone_no"];
    $id_no = $_POST["id_no"];
    $religion = $_POST["religion"];
    $gender = $_POST["gender"];
    $password = md5($_POST['password']); //password encryption with md5
    $email = $_POST["email"];
    $dateofbirth = $_POST["dateofbirth"];
    $admin = $_POST["admin"]; // Set to 'yes' if provided by an admin

    //check whether Select Image is clicked or not and upload image only if selected
    if (isset($_FILES['userProfile']['name'])) {
        //get the details of the selected image
        $image_name = $_FILES['userProfile']['name'];

        //check whether the image is selected or not and upload image only if selected
        if ($image_name != "") {
            //image is selected
            //A.REname the image
            //get the extension of selected image
            $parts = explode('.', $image_name);
            $ext = end($parts);

            //create new name for image
            $image_name = "User-Profile-" . rand(0000, 9999) . "." . $ext; //new image name may be "User-Profile-8462.jpg"

            //B.UPload the image
            //get the SRC path and Destination path

            //Source path is the current location of image to be uploaded
            $src = $_FILES['userProfile']['tmp_name'];

            //Destination path is the location uploaded image will be stored
            $dst = "../../img/userProfile/" . $image_name;

            //finally upload the image
            $upload = move_uploaded_file($src, $dst);

            //check whether image uploaded or not
            if ($upload == false) {
                //failed to upload the image
                //redirect to home page with error
                $_SESSION['upload'] = "<div class='ERROR'>Failed to Upload Image</div>";
                header('location:' . SITEURL . 'register.php');
                ob_end_flush();
                //stop the process
                die();
            }
        } else {
            $image_name = "default.jpg"; //setting default value
        }
    }

    // Prepare the SQL query
    $sql = "INSERT INTO users (fullname, username, userProfile, email, phone_no, id_no, religion, gender, reg_no, dateofbirth, password, admin) VALUES ('$fullname', '$username', '$image_name', '$email', '$phone_no', '$id_no', '$religion', '$gender', '$reg_no', '$dateofbirth', '$password', '$admin')";

    // Execute the query and provide feedback
    if (mysqli_query($conn, $sql)) {
        // Success message
        $_SESSION['register'] = "<div class='SUCCESS'>Account Created Successfully</div>";
        header('location:' . SITEURL . 'login.php');
    } else {
        // Error message
        $_SESSION['register2'] = "<div class='ERROR'>Failed to Create Account</div>";
        header('location:' . SITEURL . 'register.php');
    }
} else {
    // Redirect non-admins to the homepage or login page
    $_SESSION['register2'] = "<div class='ERROR'>Failed to Create Account</div>";
    header('location:' . SITEURL . 'register.php');
    exit;
}

// Close the database connection
mysqli_close($conn);
