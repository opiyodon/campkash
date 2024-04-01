<?php
include ('php/partials/dashboardNav.php');

// Fetch single users
$user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
$result = $conn->query("SELECT * FROM users WHERE id = $user_id ORDER BY id DESC");
$user = $result->fetch_assoc();

// Fetch all users
$all_users_result = $conn->query("SELECT * FROM users ORDER BY id DESC");
$all_users = $all_users_result->fetch_all(MYSQLI_ASSOC);

// Fetch all loans for the user
$sql = "SELECT * FROM loans ORDER BY id DESC";
$result = $conn->query($sql);
$loans = $result->fetch_all(MYSQLI_ASSOC);

// Fetch only the latest 12 loans for the user
$sql = "SELECT * FROM loans ORDER BY id DESC LIMIT 13";
$result = $conn->query($sql);
$limit_loans = $result->fetch_all(MYSQLI_ASSOC);

// Fetch the most recent transaction for each loan type for the user
$sql = "SELECT loans.* FROM loans 
        INNER JOIN (
            SELECT loan_type_id, MAX(id) AS max_id
            FROM loans 
            GROUP BY loan_type_id
        ) AS max_loans ON loans.loan_type_id = max_loans.loan_type_id AND loans.id = max_loans.max_id ORDER BY id DESC";
$result = $conn->query($sql);
$loan_type_id_loans = $result->fetch_all(MYSQLI_ASSOC);

// Fetch the most recent loan for the user
$sql = "SELECT * FROM loans WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$recent_loan = $result->fetch_assoc();
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
            <a href="#manage-loans">
                <li>
                    <i></i>
                    <p>Manage Loans</p>
                </li>
            </a>
            <a href="#manage-users">
                <li>
                    <i></i>
                    <p>Manage Users</p>
                </li>
            </a>
            <a href="#register-admin">
                <li>
                    <i></i>
                    <p>Register Admin</p>
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
            <p>Welcome to your admin dashboard! Here's an overview:</p>
            <div class="dashboard-list">
                <div class="dashboard-list">
                    <div class="dashboard-item">
                        <h3 style="text-align: center;">Recent Transactions</h3>
                        <p style="margin-top: 10px; font-size: 30px; text-align: center;">
                            <?php
                            $sql = "SELECT COUNT(*) AS total_transactions FROM loans";
                            $result = $conn->query($sql);
                            $total_transactions = $result->fetch_assoc()['total_transactions'];
                            echo $total_transactions;
                            ?>
                        </p>
                    </div>
                    <div class="dashboard-item">
                        <h3 style="text-align: center;">Active Loans</h3>
                        <p style="margin-top: 10px; font-size: 30px; text-align: center;">
                            <?php
                            $sql = "SELECT COUNT(*) AS active_loans FROM (SELECT * FROM loans WHERE loan_balance != 0 ORDER BY id DESC) AS recent_loans GROUP BY user_id";
                            $result = $conn->query($sql);
                            $active_loans = $result->num_rows;
                            echo $active_loans;
                            ?>
                        </p>
                    </div>
                    <div class="dashboard-item">
                        <h3 style="text-align: center;">Approved Loans</h3>
                        <p style="margin-top: 10px; font-size: 30px; text-align: center;">
                            <?php
                            $sql = "SELECT COUNT(*) AS approved_loans FROM loans WHERE transaction_type = 'Loan' AND loan_status IN ('approved', 'in progress', 'cleared')";
                            $result = $conn->query($sql);
                            $approved_loans = $result->fetch_assoc()['approved_loans'];
                            echo $approved_loans;
                            ?>
                        </p>
                    </div>
                    <div class="dashboard-item">
                        <h3 style="text-align: center;">Revenue Generated</h3>
                        <p style="margin-top: 10px; font-size: 30px; text-align: center;">
                            <?php
                            $sql = "SELECT SUM(revenue_generated) AS total_revenue_generated FROM loans";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $revenue_generated = $row['total_revenue_generated'];
                            echo "KES " . number_format($revenue_generated, 2); // Format as currency
                            ?>
                        </p>
                    </div>
                </div>
                <div class="dashboard-item">
                    <h3>Recent Transactions</h3>
                    <?php if (empty($limit_loans)): ?>
                        <p>There is currently no transactions. Check again later.</p>
                    <?php else: ?>
                        <p style="margin-bottom: 10px;">Your recent transactions on loans and repayments:</p>
                        <?php foreach ($limit_loans as $loan): ?>
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
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Request Loan Section -->
        <section id="manage-loans">
            <h2>Manage Loans</h2>
            <p>Need additional funds for your studies? Fill out our simple loan request form and get an approval within
                24 hours. Fill out our simple loan request form and get an approval within 24 hours.</p>
            <div class="loan-list">
                <?php foreach ($loan_type_id_loans as $loan): ?>
                    <?php
                    // Fetch the username based on the user_id
                    $user_id = $loan['user_id'];
                    $result = $conn->query("SELECT username FROM users WHERE id = $user_id");
                    $user = $result->fetch_assoc();
                    ?>
                    <div class="loan-item">
                        <h3 style="margin-bottom: 5px;">
                            <?php echo $user['username']; ?>
                        </h3>
                        <p style="margin-bottom: 3px;">Loan Type:
                            <?php echo $loan['loan_type']; ?>
                        </p>
                        <p style="margin-bottom: 3px;">Loan Amount: KES
                            <?php echo $loan['loan_amount']; ?>
                        </p>
                        <p>Loan Balance: KES
                            <?php echo $loan['loan_balance']; ?>
                        </p>
                        <p>Loan Status:
                            <?php
                            $status = $loan['loan_status'];
                            $color = '';
                            switch ($status) {
                                case 'Pending':
                                    $color = 'orange';
                                    break;
                                case 'Under Review':
                                    $color = 'blue';
                                    break;
                                case 'Approved':
                                    $color = 'green';
                                    break;
                                case 'Declined':
                                    $color = 'red';
                                    break;
                                case 'In Progress':
                                    $color = 'purple';
                                    break;
                                case 'Cleared':
                                    $color = 'black';
                                    break;
                            }
                            echo "<span style='color:{$color};'>{$status}</span>";
                            ?>
                        </p>
                        <form id="update-status-form" action="php/functions/update_status.php" method="POST"
                            style="margin-top: 10px;">
                            <label for="loan_status">Loan Status:</label>
                            <select id="loan_status" name="loan_status" class="dashboard-input" required
                                style="margin-top: 10px;">
                                <option>Select Loan Status</option>
                                <option value="Under Review">Under Review</option>
                                <option value="Approved">Approved</option>
                                <option value="Declined">Declined</option>
                            </select>
                            <input type="hiddenn" id="loan_type_id" name="loan_type_id"
                                value="<?php echo $loan['loan_type_id']; ?>">
                            <button class="repay-button">
                                Update Status
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Manage Users Section -->
        <section id="manage-users">
            <h2>Manage Users</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments! Thank you for
                your timely repayments!</p>
            <div class="loan-list">
                <div class="dashboard-item">
                    <h3>Regular Users</h3>
                    <?php foreach ($all_users as $user): ?>
                        <?php if ($user['admin'] == 'no'): ?>
                            <form action="php/functions/delete_user.php" method="POST" style="margin: 1px 0;">
                                <strong>
                                    <?php echo $user['username']; ?>
                                </strong> --- <strong>
                                    <?php echo $user['phone_no']; ?>
                                </strong>
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                                <button type="submit" class="repay-button" style="margin-left: 20px;">Delete User</button>
                            </form>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="dashboard-item">
                    <h3>Admin Users</h3>
                    <?php foreach ($all_users as $user): ?>
                        <?php if ($user['admin'] == 'yes'): ?>
                            <form action="php/functions/delete_user.php" method="POST" style="margin: 1px 0;">
                                <strong>
                                    <?php echo $user['username']; ?>
                                </strong> --- <strong>
                                    <?php echo $user['phone_no']; ?>
                                </strong>
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                                <button type="submit" class="repay-button" style="margin-left: 20px;">Delete Admin</button>
                            </form>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Register Admin Section -->
        <section id="register-admin">
            <h2>Register New Admin</h2>
            <p>Ready to make a payment? Enter the amount you wish to pay and confirm your transaction. Thank you for
                your timely repayments! Thank you for
                your timely repayments!</p>
            <div class="form-box"
                style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
                <div class="register-form"
                    style="width: 600px; height: fit-content; padding: 40px 60px; border-radius: 30px; background: #333;">
                    <h2 style="margin-bottom: 20px; color: #aaa; text-align: center;">Register New Admin</h2>
                    <form action="php/functions/register_admin.php" method="POST" enctype="multipart/form-data">
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
                    </form>
                </div>
            </div>
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