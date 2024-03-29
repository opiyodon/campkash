<?php include ('php/partials/dashboardNav.php'); ?>

<!-- Header -->
<header>
    <div class="dashboardNav">
        <a href="index.php">
            <div class="logo">
                <img src="img/logo.jpg" alt="CampKash Logo">
                <p>Camp<span>Kash</span></p>
            </div>
        </a>
        <div class="user-profile">
            <div class="profileBox">
                <img src="img/5.jpg" alt="User Profile" class="profile-pic">
                <p>Artkins</p>
            </div>
            <div class="dropdown-content || dropdown-close">
                <div class="profileBtn">
                    <a href="#profile">Profile</a>
                </div>
                <a href="logout.php" class="dropdown-logout">Logout</a>
            </div>
        </div>
    </div>
</header>

<div class="dashboardRow">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul>
            <a href="#dashboard-summary" class="active">
                <li>
                    <i></i>
                    <p>Dashboard</p>
                </li>
            </a>
            <a href="#loan-summary">
                <li>
                    <i></i>
                    <p>My loans</p>
                </li>
            </a>
            <a href="#repay-loan">
                <li>
                    <i></i>
                    <p>Repay loans</p>
                </li>
            </a>
            <a href="#request-loan">
                <li>
                    <i></i>
                    <p>Request loans</p>
                </li>
            </a>
        </ul>
        <a class="logout" href="logout.php">
            <p>Logout</p>
        </a>
    </aside>

    <!-- Main Content -->
    <div class="dashboardContainer main-content">
        <!-- Dashboard Summary Section -->
        <section id="dashboard-summary" class="active-section">
            <div>
                <div class="card">
                    <h2>Dashboard Overview</h2>
                    <p>Welcome to your student loan dashboard! This is your hub for all loan-related information.</p>
                </div>
            </div>
            <div>
                <div class="card">
                    <h3>Next Repayment Date</h3>
                    <p>Your next scheduled repayment is on: <strong>15th April 2024</strong></p>
                </div>
                <div class="card">
                    <h3>Recent Transactions</h3>
                    <ul>
                        <li>Payment received: KES 20,000 - 28th March 2024</li>
                        <li>Interest applied: KES 5,000 - 1st March 2024</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="card">
                    <h3>Loan Balance</h3>
                    <p>Your current outstanding loan balance is: <strong>KES 350,000</strong></p>
                    <!-- Graph/Chart Placeholder -->
                    <canvas id="balance-chart"></canvas>
                </div>
            </div>
        </section>

        <!-- Loan Summary Section -->
        <section id="loan-summary">
            <h2>Loan Summary</h2>
            <p>Your current loan balance is $3,500. You have successfully paid 5 out of 10 installments. Keep up the
                good
                work!</p>

            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
            </div>
        </section>

        <!-- Repay Loan Section -->
        <section id="repay-loan">
            <h2>Repay Your Loan</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your
                timely repayments!</p>

            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
            </div>
            <!-- Repayment form and details -->
        </section>

        <!-- Request Loan Section -->
        <section id="request-loan">
            <h2>Request a New Loan</h2>
            <p>Need additional funds for your studies? Fill out our simple loan request form and get an approval within
                24
                hours.</p>

            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
            </div>
            <!-- Loan request form -->
        </section>

        <!-- Profile Section -->
        <section id="profile">
            <h2>Profile</h2>
            <p>Change your profile.</p>

            <div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non ducimus nam perspiciatis possimus
                    reiciendis ullam alias est doloribus, explicabo tempora! Repudiandae assumenda officia culpa eveniet
                    optio exercitationem distinctio molestias?
                </p>
            </div>
        </section>
    </div>
</div>

<?php include ('php/partials/footer.php'); ?>