<?php
// Check whether the updatePassword button is clicked or not
if (isset($_POST['updatePassword'])) {
    // Get new password and confirm password from the form
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate if new password matches the confirm password
    if ($newPassword == $confirmPassword) {
        // Encrypt the new password using MD5
        $password = md5($newPassword);


        // Update the password in the database
        $sql = "UPDATE user SET password='$password' WHERE id = $user_id";
        $res = mysqli_query($conn, $sql);

        // Check if query executed successfully
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
