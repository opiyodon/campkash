<?php include ('php/partials/loginNav.php'); ?>

<section class="reset_password"
    style="background: url('img/2.jpg') no-repeat center center; padding: 40px 0; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; width: 100%;">
    <div class="login-form"
        style="width: 600px; height: fit-content; padding: 40px 60px; border-radius: 30px; backdrop-filter: blur(30px);">
        <h2 style="margin-bottom: 20px; color: #aaa; text-align: center;">Reset Password</h2>
        <form action="php/functions/reset_password.php" method="POST" onsubmit="return validatePasswords();">
            <input type="hidden" name="reset_token" value="<?php echo $_GET['reset_token']; ?>">
            <div class="form-group">
                <label for="new_password" class="label">New Password:</label>
                <input type="password" id="new_password" name="new_password" class="input" required>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="label">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="input" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Reset Password</button>
            </div>
            <div class="form-group" style="text-align: center;">
                <p style="color: #aaa;"><a href="login.php" class="auth-link">Go back to Login Page</a>
                </p>
            </div>
        </form>
    </div>
</section>

<?php include ('php/partials/loginFooter.php'); ?>