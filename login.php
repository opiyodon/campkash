<?php include ('php/partials/loginNav.php'); ?>

<section class="login"
    style="background: url('img/2.jpg') no-repeat center center; padding: 40px 0; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; width: 100%;">
    <div class="login-form"
        style="width: 600px; height: fit-content; padding: 40px 60px; border-radius: 30px; backdrop-filter: blur(30px);">
        <h2 style="margin-bottom: 20px; color: #aaa; text-align: center;">Login</h2>
        <form action="php/functions/login.php" method="POST">
            <div class="form-group">
                <label for="username" class="label">Username:</label>
                <input type="text" id="username" name="username" class="input" required>
            </div>
            <div class="form-group">
                <label for="password" class="label">Password:</label>
                <input type="password" id="password" name="password" class="input" required>
            </div>
            <div style="display: flex; align-items: center; gap: 10px; margin: 10px;">
                <input type="checkbox" id="admin" name="admin" style="margin-bottom: 1px;">
                <label for="admin" style="color: #aaa; padding-top: 1px;">Login as Admin</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
            <div class="form-group" style="text-align: center;">
                <a href="forgot_password.php" class="auth-link">Forgot password?</a>
            </div>
            <div class="form-group" style="text-align: center;">
                <p style="color: #aaa;">Don't have an account? <a href="register.php" class="auth-link">Register</a>
                </p>
            </div>
        </form>
    </div>
</section>

<?php include ('php/partials/loginFooter.php'); ?>
