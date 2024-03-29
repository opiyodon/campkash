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
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <!-- Loan Summary Section -->
        <section id="loan-summary">
            <h2>Loan Summary</h2>
            <table>
                <thead>
                    <tr>
                        <th>Loan Name</th>
                        <th>Loan Amount</th>
                        <th>Total Installments</th>
                        <th>Installments Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Student Loan A</td>
                        <td>$5,000</td>
                        <td>10</td>
                        <td>5</td>
                        <td>In Progress</td>
                    </tr>
                    <tr>
                        <td>Emergency Loan</td>
                        <td>$2,000</td>
                        <td>6</td>
                        <td>6</td>
                        <td>Cleared</td>
                    </tr>
                    <!-- Add more rows for other loans -->
                </tbody>
            </table>
        </section>

        <!-- Repay Loan Section -->
        <section id="repay-loan">
            <h2>Repay Your Loan</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments!</p>
            <div class="loan-list">
                <!-- Loan details for each loan -->
                <div class="loan-item">
                    <h3>Student Loan A</h3>
                    <p>Loan Amount: $5,000</p>
                    <p>Installments Remaining: 5 out of 10</p>
                    <button class="repay-button">Repay</button>
                </div>
                <div class="loan-item">
                    <h3>Emergency Loan</h3>
                    <p>Loan Amount: $2,000</p>
                    <p>Installments Remaining: 0 (Cleared)</p>
                    <!-- No repayment button for cleared loan -->
                </div>
                <!-- Add more loan items as needed -->
            </div>
            <!-- Repayment form -->
            <form id="repayment-form">
                <label for="payment-amount">Enter Payment Amount:</label>
                <input type="number" id="payment-amount" name="payment-amount" min="1" required>
                <button type="submit" class="confirm-button">Confirm Payment</button>
            </form>
        </section>

        <!-- Request Loan Section -->
        <section id="request-loan">
            <h2>Request a New Loan</h2>
            <p>Need additional funds for your studies? Fill out our simple loan request form and get an approval within
                24 hours.</p>
            <form id="loan-request-form">
                <label for="loan-amount">Loan Amount:</label>
                <input type="number" id="loan-amount" name="loan-amount" min="1" required>
                <label for="installments">Number of Installments:</label>
                <input type="number" id="installments" name="installments" min="1" required>
                <button type="submit" class="request-button">Submit Request</button>
            </form>
        </section>

        <!-- Profile Section -->
        <section id="profile">
            <h2>Profile</h2>
            <div class="profile-card">
                <img src="user-profile-pic.jpg" alt="User Profile Picture">
                <h3>John Doe</h3>
                <p>Email: john.doe@example.com</p>
                <p>Phone: +1 123-456-7890</p>
                <!-- Add more profile details as needed -->
            </div>
            <form id="password-update-form">
                <h3>Update Password</h3>
                <label for="current-password">Current Password:</label>
                <input type="password" id="current-password" name="current-password" required>
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required>
                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <button type="submit" class="update-button">Update Password</button>
            </form>
        </section>
    </div>
</div>

<?php include ('php/partials/footer.php'); ?>