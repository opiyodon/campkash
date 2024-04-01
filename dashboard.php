<?php
include ('php/partials/dashboardNav.php');

// Fetch user details
$user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
$result = $conn->query("SELECT * FROM users WHERE id = $user_id ORDER BY id DESC");
$user = $result->fetch_assoc();

// Fetch all loans for the user
$sql = "SELECT * FROM loans WHERE user_id = $user_id ORDER BY id DESC";
$result = $conn->query($sql);
$loans = $result->fetch_all(MYSQLI_ASSOC);

// Prepare data for the chart
$loanData = array_fill(0, 12, 0);
$paymentData = array_fill(0, 12, 0);
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

foreach ($loans as $loan) {
    $monthIndex = date('n', strtotime($loan['date_of_transaction'])) - 1;
    if ($loan['transaction_type'] == 'Loan') {
        $loanData[$monthIndex] += $loan['loan_amount'];
    } else {
        $paymentData[$monthIndex] += $loan['payment_amount'];
    }
}

// Convert arrays to JSON
$loanDataJson = json_encode($loanData);
$paymentDataJson = json_encode($paymentData);
$monthsJson = json_encode($months);

// Echo the JSON data as JavaScript variables
echo "<script>
var loanData = JSON.parse('$loanDataJson');
var paymentData = JSON.parse('$paymentDataJson');
var months = JSON.parse('$monthsJson');
</script>";

// Fetch only the latest 12 loans for the user
$sql = "SELECT * FROM loans WHERE user_id = $user_id ORDER BY id DESC LIMIT 13";
$result = $conn->query($sql);
$limit_loans = $result->fetch_all(MYSQLI_ASSOC);

// Fetch the most recent loan for the user
$sql = "SELECT * FROM loans WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$recent_loan = $result->fetch_assoc();

// Check if $recent_loan is not null before trying to access its elements
$recent_loan_balance = isset($recent_loan['loan_balance']) ? $recent_loan['loan_balance'] : 0;
$recent_due_date = isset($recent_loan['due_date']) ? $recent_loan['due_date'] : 'N/A';

// Check if loan_balance is set and use it, or use 0 if it's not
$loanBalance = isset($recent_loan['loan_balance']) ? $recent_loan['loan_balance'] : 0;

// Echo the loan balance as a JavaScript variable
echo "<script>var loanBalance = {$loanBalance};</script>";

// Check if loan_status is set and use it, or use 'Declined' if it's not
$loanStatus = isset($recent_loan['loan_status']) ? $recent_loan['loan_status'] : 'Declined';

// Echo the loan status as a JavaScript variable
echo "<script>var loanStatus = '{$loanStatus}';</script>";

// Fetch the most recent transaction for each loan type for the user
$sql = "SELECT loans.* FROM loans 
        INNER JOIN (
            SELECT loan_type_id, MAX(id) AS max_id
            FROM loans 
            WHERE user_id = $user_id 
            GROUP BY loan_type_id
        ) AS max_loans ON loans.loan_type_id = max_loans.loan_type_id AND loans.id = max_loans.max_id ORDER BY id DESC";
$result = $conn->query($sql);
$loan_type_id_loans = $result->fetch_all(MYSQLI_ASSOC);
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
                <?php
                // Check whether the image is available or not
                if ($user['userProfile'] != "") {
                    // Display image
                    ?>

                    <img src="img/userProfile/<?php echo $user['userProfile']; ?>" alt="User Profile" class="profile-pic">

                    <?php
                } else {
                    // Display message
                    echo "<div class='ERROR'>Image Not Added</div>";
                }
                ?>
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
                    <?php if (empty($limit_loans)): ?>
                        <p>You currently don't have any transactions. Apply for a loan to see your transaction history here.
                        </p>
                    <?php else: ?>
                        <p style="margin-bottom: 10px;">Your recent transactions on loans and repayments:</p>
                        <?php foreach ($limit_loans as $loan): ?>
                            <?php if (in_array($loan['loan_status'], ['Approved', 'In Progress', 'Cleared'])): ?>
                                <?php if ($loan['transaction_type'] == 'Loan'): ?>
                                    <p style="margin: 1px 0;">
                                        <strong>
                                            <?php echo $loan['transaction_type']; ?>
                                        </strong> Approved --- <strong>KES
                                            <?php echo $loan['loan_amount']; ?>
                                        </strong> --- on <strong>
                                            <?php echo $loan['date_of_transaction']; ?>
                                        </strong>
                                    </p>
                                <?php else: ?>
                                    <p style="margin: 1px 0;">
                                        <strong>
                                            <?php echo $loan['transaction_type']; ?>
                                        </strong> Received --- <strong>KES
                                            <?php echo $loan['payment_amount']; ?>
                                        </strong> --- on <strong>
                                            <?php echo $loan['payment_date']; ?>
                                        </strong>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="dashboard-item">
                    <h3>Loan Balance</h3>
                    <?php if (isset($recent_loan) && in_array($recent_loan['loan_status'], ['Approved', 'In Progress', 'Cleared'])): ?>
                        <p>Your current outstanding loan balance is: <strong>KES
                                <?php echo $recent_loan_balance; ?>
                            </strong></p>
                        <div style="margin-top: 20px;">
                            <canvas id="myChart"></canvas>
                        </div>
                    <?php else: ?>
                        <p>You currently don't have any outstanding loan balance.</p>
                    <?php endif; ?>
                </div>

                <div class="dashboard-item">
                    <h3>Next Repayment Date</h3>
                    <?php if (isset($recent_loan) && in_array($recent_loan['loan_status'], ['Approved', 'In Progress', 'Cleared'])): ?>
                        <?php if ($recent_loan_balance == 0): ?>
                            <p>You have no outstanding loan balance, so there is no scheduled repayment date.</p>
                        <?php else: ?>
                            <p>Next scheduled repayment is on: <strong>
                                    <?php echo $recent_due_date; ?>
                                </strong></p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>You currently don't have any scheduled repayments.</p>
                    <?php endif; ?>
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
                <?php if (empty($loan_type_id_loans)): ?>
                    <div class="loan-item">
                        <p>
                            You currently don't have any loans. Apply for a loan to see your loan details here.
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach ($loan_type_id_loans as $loan): ?>
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
                            <?php
                            $status = $loan['loan_status'];
                            $color = '';
                            switch ($status) {
                                case 'Pending':
                                    $color = '#f9a825'; // a vibrant yellow
                                    break;
                                case 'Under Review':
                                    $color = '#407ce4'; // the blue you provided
                                    break;
                                case 'Approved':
                                    $color = '#09b498'; // the teal you provided
                                    break;
                                case 'Declined':
                                    $color = '#ec4e4e'; // the red you provided
                                    break;
                                case 'In Progress':
                                    $color = '#9c27b0'; // a deep purple
                                    break;
                                case 'Cleared':
                                    $color = '#4caf50'; // a rich green
                                    break;
                            }
                            ?>

                            <button class="btn-disabled" style='background-color:<?= $color; ?>'>
                                <?php echo $status; ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <!-- Repay Loan Section -->
        <section id="repay-loan">
            <h2>Repay Your Loan</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments! Thank you for
                your timely repayments!</p>
            <div class="loan-list">
                <?php if (empty($loan_type_id_loans)): ?>
                    <div class="loan-item">
                        <p>You currently don't have any active loans. Apply for a loan to see your loan details here.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($loan_type_id_loans as $loan): ?>
                        <?php if (in_array($loan['loan_status'], ['Approved', 'In Progress'])): ?>
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
                                    <input type="hidden" id="loan_id" name="loan_id" value="<?php echo $recent_loan['id']; ?>">
                                    <input type="hidden" id="loan_amount" name="loan_amount"
                                        value="<?php echo $recent_loan['loan_amount']; ?>">
                                    <input type="hidden" id="due_date" name="due_date"
                                        value="<?php echo $recent_loan['due_date']; ?>">
                                    <input type="hidden" id="loan_balance" name="loan_balance"
                                        value="<?php echo $recent_loan['loan_balance']; ?>">
                                    <input type="hidden" id="loan_type" name="loan_type"
                                        value="<?php echo $recent_loan['loan_type']; ?>">
                                    <input type="hidden" id="loan_type_id" name="loan_type_id"
                                        value="<?php echo $recent_loan['loan_type_id']; ?>">
                                    <input type="hidden" id="loan_status" name="loan_status"
                                        value="<?php echo $recent_loan['loan_status']; ?>">
                                    <input type="hidden" id="interest" name="interest"
                                        value="<?php echo $recent_loan['interest']; ?>">
                                    <input type="hidden" id="max_loan_amount" name="max_loan_amount"
                                        value="<?php echo $recent_loan['max_loan_amount']; ?>">
                                    <button type="submit" class="repay-button">Confirm Payment</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
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
                    // Check if max_loan_amount is set and use it, or use 5000 if it's not
                    $max_loan_amount = isset($loan['max_loan_amount']) ? $loan['max_loan_amount'] : 1000;
                    for ($i = 0; $i <= $max_loan_amount; $i += 1000) {
                        echo "<option value='$i'>KES $i</option>";
                    }
                    ?>
                </select>
                <input type="hidden" id="last_loan_balance" name="last_loan_balance"
                    value="<?php echo $recent_loan['loan_balance']; ?>">
                <input type="hidden" id="last_loan_status" name="last_loan_status"
                    value="<?php echo $recent_loan['loan_status']; ?>">
                <button type="submit" class="request-button">Submit Request</button>
            </form>
        </section>

        <!-- Profile Section -->
        <section id="profile">
            <h2>Profile</h2>
            <p>Below is your profile. You can change your password at will. Below is your profile. You can change your
                password at will. Below is your profile. You can change your password at will.</p>
            <div class="loan-list">
                <form action="php/functions/update_profile.php" method="POST" enctype="multipart/form-data"
                    class="loan-item profile-img-box">
                    <?php
                    // Check whether the image is available or not
                    if ($user['userProfile'] != "") {
                        // Display image
                        ?>

                        <div class="changeProfileBox">
                            <img src="img/userProfile/<?php echo $user['userProfile']; ?>" class="profile-img"
                                alt="User Profile Picture">
                            <div>
                                <label for="userProfile">
                                    <div class="profile-overlay">
                                        <i class="fa-solid fa-camera profileImageIcon"></i>
                                    </div>
                                </label>
                                <input type="file" id="userProfile" name="userProfile" hidden accept=".jpeg, .png, .jpg">
                            </div>
                        </div>

                        <?php
                    } else {
                        // Display message
                        echo "<div class='ERROR'>Image Not Added</div>";
                    }
                    ?>
                    <button type="submit" class="request-button">Update Profile</button>
                </form>
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
                    <p style="margin-bottom: 3px;">Phone:
                        <?php echo $user['phone_no']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">ID Number:
                        <?php echo $user['id_no']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">Registration:
                        <?php echo $user['reg_no']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">Gender:
                        <?php echo $user['gender']; ?>
                    </p>
                    <p style="margin-bottom: 3px;">D.O.B:
                        <?php echo $user['dateofbirth']; ?>
                    </p>
                    <p>Religion:
                        <?php echo $user['religion']; ?>
                    </p>
                </div>
            </div>
            <form action="php/functions/update_password.php" method="POST" id="password-update-form"
                onsubmit="return validatePasswords();">
                <h3 style="margin-top: 15px; margin-bottom: 15px;">Update Password</h3>
                <label for="current_password">Current Password:</label>
                <input class="dashboard-input" type="password" id="current_password" name="current_password" required>
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