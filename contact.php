<?php include ('php/partials/nav.php'); ?>

<!-- Contact Section -->
<section class="contact-banner" style="background: #dde0e6; text-align: center; padding: 50px 0;">
    <div class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions or need further information, please reach out to us.</p>
    </div>
</section>

<?php
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    echo "<script>displayAlert('{$alert['message']}', '{$alert['type']}');</script>";
    unset($_SESSION['alert']); // Remove the alert from the session
}
?>

<section class="contact" style="background: url('img/12.jpg') no-repeat center center; padding: 20px; background-size: cover;">
    <div class="container">
        <div class="contact-form">
            <form action="php/functions/contact_form.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn contactBtn">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include ('php/partials/footer.php'); ?>
