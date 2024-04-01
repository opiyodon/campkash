<?php include ('php/partials/nav.php'); ?>

<section class="hero">
    <!-- Image Slider -->
    <div class="slider">
        <div class="slides">
            <!-- Radio buttons for navigation -->
            <input hidden type="radio" name="radio-btn" id="radio1" checked>
            <input hidden type="radio" name="radio-btn" id="radio2">
            <input hidden type="radio" name="radio-btn" id="radio3">
            <input hidden type="radio" name="radio-btn" id="radio4">
            <input hidden type="radio" name="radio-btn" id="radio5">
            <input hidden type="radio" name="radio-btn" id="radio6">
            <input hidden type="radio" name="radio-btn" id="radio7">
            <input hidden type="radio" name="radio-btn" id="radio8">
            <input hidden type="radio" name="radio-btn" id="radio9">
            <input hidden type="radio" name="radio-btn" id="radio10">

            <!-- Slide images -->
            <div class="slide first">
                <img src="img/1.jpg" alt="Student life">
            </div>
            <div class="slide">
                <img src="img/2.jpg" alt="University campus">
            </div>
            <div class="slide">
                <img src="img/3.jpg" alt="Graduation day">
            </div>
            <div class="slide">
                <img src="img/4.jpg" alt="Study group">
            </div>
            <div class="slide">
                <img src="img/5.jpg" alt="University campus">
            </div>
            <div class="slide">
                <img src="img/6.jpg" alt="Graduation day">
            </div>
            <div class="slide">
                <img src="img/7.jpg" alt="Study group">
            </div>
            <div class="slide">
                <img src="img/8.jpg" alt="University campus">
            </div>
            <div class="slide">
                <img src="img/9.jpg" alt="Graduation day">
            </div>
            <div class="slide">
                <img src="img/10.jpg" alt="Study group">
            </div>

            <!-- Navigation -->
            <div class="navigation">
                <label for="radio1" class="nav-btn"></label>
                <label for="radio2" class="nav-btn"></label>
                <label for="radio3" class="nav-btn"></label>
                <label for="radio4" class="nav-btn"></label>
                <label for="radio5" class="nav-btn"></label>
                <label for="radio6" class="nav-btn"></label>
                <label for="radio7" class="nav-btn"></label>
                <label for="radio8" class="nav-btn"></label>
                <label for="radio9" class="nav-btn"></label>
                <label for="radio10" class="nav-btn"></label>
            </div>
        </div>
    </div>
    <div class="heroBox">
        <h1>Welcome to CampKash</h1>
        <p>Empowering your education with flexible loans.</p>
        <a href="dashboard.php">
            <button class="btn">
                Apply Now
            </button>
        </a>
    </div>
</section>

<!-- Why Loans Section -->
<section class="why-loans">
    <div class="container">
        <h2>Why Choose CampKash?</h2>
        <p>At CampKash, we understand the financial challenges faced by university students. That's why we offer loans tailored to your needs, with competitive interest rates and no hidden fees. Our flexible repayment plans are designed to accommodate your academic schedule, allowing you to focus on your studies without financial stress.</p>
        <a href="about.php" class="btn-sec">Know More</a>
    </div>
</section>

<!-- How to Apply Section -->
<section class="how-to-apply">
    <div class="container">
        <h2>How to Apply</h2>
        <p>Getting a student loan with CampKash is straightforward. Start by creating your account, fill in the application form, and upload the necessary documents. Our dedicated team will assess your application and respond swiftly. Financial freedom is just a few clicks away!</p>
        <a href="services.php" class="btn-sec">Loan Options</a>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <p>Got questions? Check out our FAQ section for answers to all your queries about student loans. From eligibility criteria to repayment schedules, we've got you covered. If you can't find what you're looking for, our customer support team is here to help!</p>
        <a href="contact.php" class="btn-sec">Contact Us</a>
    </div>
</section>

<?php include ('php/partials/footer.php'); ?>