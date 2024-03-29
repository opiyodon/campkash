<?php include ('php/partials/loginNav.php'); ?>

<section class="forgot_password"
    style="background: url('img/2.jpg') no-repeat center center; padding: 40px 0; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; width: 100%;">
    <div class="login-form"
        style="width: 600px; height: fit-content; padding: 40px 60px; border-radius: 30px; backdrop-filter: blur(30px);">
        <h2 style="margin-bottom: 20px; color: #aaa; text-align: center;">Forgot Password</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <form action="php/functions/forgot_password.php" method="POST">
            <div class="form-group">
                <label for="email" class="label">Email:</label>
                <input type="email" id="email" name="email" class="input" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Send Link</button>
            </div>
            <div class="form-group" style="text-align: center;">
                <p style="color: #aaa;"><a href="login.php" class="auth-link">Go back to Login Page</a>
                </p>
            </div>
        </form>
    </div>
</section>

<?php include ('php/partials/loginFooter.php'); ?>
