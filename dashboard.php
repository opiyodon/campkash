<?php
include ('php/partials/dashboardNav.php');

// Fetch user details
$user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();

// Fetch loans for the user
$sql = "SELECT * FROM loans WHERE user_id = $user_id";
$result = $conn->query($sql);
$loans = $result->fetch_all(MYSQLI_ASSOC);
?>

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
                <p>
                    <?php echo $user['username']; ?>
                </p>
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
            <h2>Dashboard Overview</h2>
            <p>Welcome to your student loan dashboard! This is your hub for all loan-related information.</p>
            <div class="dashboard-list">
                <div class="dashboard-item">
                    <h3>Recent Transactions</h3>
                    <p style="margin-bottom: 10px;">Your recent transactions on loan and repayments:</p>

                    <p style="margin: 1px 0;"><strong>Payment</strong> Received: <strong>KES 20,000</strong> - 28th
                        March 2024</p>
                    <p style="margin: 1px 0;"><strong>Loan</strong> Approved: <strong>KES 5,000</strong> - 1st March
                        2024</p>

                </div>
                <div class="dashboard-item">
                    <h3>Loan Balance</h3>
                    <p>Your current outstanding loan balance is: <strong>KES 350,000</strong></p>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="dashboard-item">
                    <h3>Next Repayment Date</h3>
                    <p>Next scheduled repayment is on: <strong>15/01/2004</strong></p>
                </div>
            </div>
        </section>

        <!-- Loan Summary Section -->
        <section id="loan-summary">
            <h2>Loan Summary</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments! Thank you for
                your timely repayments!</p>
            <div class="loan-list">
                <?php foreach ($loans as $loan): ?>
                    <div class="loan-item">
                        <h3 style="margin-bottom: 5px;">
                            <?php echo $loan['loan_type']; ?>
                        </h3>
                        <p style="margin-bottom: 3px;">Loan Amount: KES
                            <?php echo $loan['loan_amount']; ?>
                        </p>
                        <p>Loan Balance: KES
                            <?php echo $loan['loan_balance']; ?>
                        </p>
                        <?php if ($loan['loan_status'] == 'declined'): ?>
                            <button class="repay-button btn-error">
                                <?php echo $loan['loan_status']; ?>
                            </button>
                        <?php else: ?>
                            <button class="repay-button btn-disabled">
                                <?php echo $loan['loan_status']; ?>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </section>

        <!-- Repay Loan Section -->
        <section id="repay-loan">
            <h2>Repay Your Loan</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments! Thank you for
                your timely repayments!</p>
            <div class="loan-list">
                <?php foreach ($loans as $loan): ?>
                    <div class="loan-item">
                        <h3 style="margin-bottom: 5px;">
                            <?php echo $loan['loan_type']; ?>
                        </h3>
                        <p style="margin-bottom: 3px;">Loan Amount: KES
                            <?php echo $loan['loan_amount']; ?>
                        </p>
                        <p>Loan Balance: KES
                            <?php echo $loan['loan_balance']; ?>
                        </p>
                        <!-- Repayment form -->
                        <form id="repayment-form" action="php/functions/repay_loan.php" method="POST">
                            <label for="payment-amount">Enter Payment Amount:</label>
                            <input class="dashboard-input" type="number" id="payment-amount" name="payment-amount" min="1"
                                required>
                            <input type="hidden" id="loan_id" name="loan_id" value="<?php echo $loan['id']; ?>">
                            <input type="hidden" id="loan_amount" name="loan_amount" value="<?php echo $loan['loan_amount']; ?>">
                            <input type="hidden" id="due_date" name="due_date" value="<?php echo $loan['due_date']; ?>">
                            <input type="hidden" id="loan_balance" name="loan_balance" value="<?php echo $loan['loan_balance']; ?>">
                            <button type="submit" class="repay-button">Confirm Payment</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Request Loan Section -->
        <section id="request-loan">
            <h2>Request a New Loan</h2>
            <p>Need additional funds for your studies? Fill out our simple loan request form and get an approval within
                24 hours. Fill out our simple loan request form and get an approval within 24 hours.</p>
            <form id="loan-request-form" action="php/functions/request_loan.php" method="POST">
                <label for="loan_type">Loan Type:</label>
                <select id="loan_type" name="loan_type" class="dashboard-input" required>
                    <option>Select Loan Type</option>
                    <option value="Tuition Loans">Tuition Loans</option>
                    <option value="Book & Supplies Loans">Book & Supplies Loans</option>
                    <option value="Living Expense Loans">Living Expense Loans</option>
                    <option value="Emergency Loans">Emergency Loans</option>
                </select>
                <label for="loan_amount">Loan Amount:</label>
                <select id="loan_amount" name="loan_amount" class="dashboard-input" required>
                    <option>Select Loan Amount</option>
                    <?php
                    // Assuming $max_loan_amount is fetched from the database
                    for ($i = 5000; $i <= $loan['max_loan_amount']; $i += 5000) {
                        echo "<option value='$i'>KES $i</option>";
                    }
                    ?>
                </select>

                <button type="submit" class="request-button">Submit Request</button>
            </form>
        </section>

        <!-- Profile Section -->
        <section id="profile">
            <h2>Profile</h2>
            <p>Below is your profile. You can change your password at will. Below is your profile. You can change your
                password at will. Below is your profile. You can change your password at will.</p>
            <div class="loan-list">
                <div class="loan-item profile-img-box">
                    <img class="profile-img" src="img/5.jpg" alt="User Profile Picture">
                    <button type="submit" class="request-button">Update Profile</button>
                </div>
                <div class="loan-item">
                    <h3 style="margin-bottom: 5px;">User Details</h3>
                    <p style="margin-bottom: 3px;">Full Name:
                        <?php echo $user['fullname']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">Username:
                        <?php echo $user['username']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">Email:
                        <?php echo $user['email']; ?>
                    </p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
            <form id="password-update-form" onsubmit="return validatePasswords();">
                <h3 style="margin-top: 15px; margin-bottom: 15px;">Update Password</h3>
                <label for="current-password">Current Password:</label>
                <input class="dashboard-input" type="password" id="current-password" name="current-password" required>
                <label for="new_password">New Password:</label>
                <input class="dashboard-input" type="password" id="new_password" name="new_password" required>
                <label for="confirm_password">Confirm New Password:</label>
                <input class="dashboard-input" type="password" id="confirm_password" name="confirm_password" required>
                <button type="submit" class="request-button">Update Password</button>
            </form>
        </section>
    </div>
</div>

<?php include ('php/partials/footer.php'); ?>