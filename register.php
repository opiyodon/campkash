<?php include ('php/partials/loginNav.php'); ?>

<section class="register"
    style="background: url('img/2.jpg') no-repeat center center; padding: 40px 0; background-size: cover; display: flex; justify-content: center; align-items: center; height: 100%; width: 100%;">
    <div class="register-form"
        style="width: 600px; height: fit-content; padding: 40px 60px; border-radius: 30px; backdrop-filter: blur(30px);">
        <h2 style="margin-bottom: 20px; color: #aaa; text-align: center;">Register</h2>
        <form action="php/functions/register.php" method="POST" enctype="multipart/form-data">
            <!-- Hidden input field for admin -->
            <input type="hiddenn" id="admin" name="admin"
                value="<?php echo (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') ? 'yes' : 'no'; ?>">
            <div class="form-group">
                <label for="userProfile" class="label">Profile Picture:</label>
                <input type="file" id="userProfile" name="userProfile" class="input">
                <img id="profilePreview" src="#" alt="Profile Image" style="display: none;" />
            </div>
            <div class="form-group">
                <label for="fullname" class="label">Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="input" required>
            </div>
            <div class="form-group">
                <label for="username" class="label">Username:</label>
                <input type="text" id="username" name="username" class="input" required>
            </div>

            <div class="form-group">
                <label for="reg_no" class="label">Registration Number:</label>
                <input type="text" id="reg_no" name="reg_no" class="input" required>
            </div>

            <div class="form-group">
                <label for="phone_no" class="label">Phone Number:</label>
                <input type="text" id="phone_no" name="phone_no" class="input" required>
            </div>

            <div class="form-group">
                <label for="id_no" class="label">ID Number:</label>
                <input type="text" id="id_no" name="id_no" class="input" required>
            </div>

            <div class="form-group">
                <label for="religion" class="label">Religion:</label>
                <input type="text" id="religion" name="religion" class="input" required>
            </div>

            <div class="form-group">
                <label for="gender" class="label">Gender:</label>
                <select id="gender" name="gender" class="input" required>
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password" class="label">Password:</label>
                <input type="password" id="password" name="password" class="input" required>
            </div>

            <div class="form-group">
                <label for="email" class="label">Email:</label>
                <input type="email" id="email" name="email" class="input" required>
            </div>

            <div class="form-group">
                <label for="dateofbirth" class="label">Date of Birth:</label>
                <input type="date" id="dateofbirth" name="dateofbirth" class="input" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Register</button>
            </div>
            <div class="form-group" style="text-align: center;">
                <p style="color: #aaa;">Already have an account? <a href="login.php" class="auth-link">Login</a>
                </p>
            </div>
        </form>
    </div>
</section>

<?php include ('php/partials/loginFooter.php'); ?>