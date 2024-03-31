<?php
// Process the Value from Form and Save in Database
// Check whether the updateProfile button is clicked or not
if (isset($_POST['updateProfile'])) {
    // Button Clicked

    // 1. Upload the image if selected

    // Check whether upload button is clicked or not
    if (isset($_FILES['userProfile']['name']) && !empty($_FILES['userProfile']['name'])) {
        // Get the details of the selected image
        $image_name = $_FILES['userProfile']['name'];

        // A. Rename the image
        // Get the extension of selected image
        $ext = end(explode('.', $image_name));

        // Create new name for image
        $image_name = "User-Profile-" . rand(0000, 9999) . "." . $ext; // New image name may be "User-Profile-8462.jpg"

        // B. Upload the image
        $src = $_FILES['userProfile']['tmp_name'];
        $dst = "img/userProfile/" . $image_name;
        $upload = move_uploaded_file($src, $dst);

        // Check whether image uploaded or not
        if (!$upload) {
            //redirect to Home Page
            header('location:' . SITEURL_USER . 'index.php');
            ob_end_flush();
        } else {
            // Remove the previous image if it exists and is not the default
            if ($userProfile != "" && $userProfile != "No-Profile.png") {
                $remove_path = "img/userProfile/" . $userProfile;
                if (file_exists($remove_path)) {
                    unlink($remove_path);
                }
            }

            // Update the user's profile image in the database
            $sql = "UPDATE user SET userProfile = '$image_name' WHERE id = $user_id";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                //redirect to Home Page
                header('location:' . SITEURL_USER . 'index.php');
                ob_end_flush();
            } else {
                //redirect to Home Page
                header('location:' . SITEURL_USER . 'index.php');
                ob_end_flush();
            }
        }
    }
}
