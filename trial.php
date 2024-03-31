<?php include('php/partials/dashboardNav.php'); ?>

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
            <img src="img/5.jpg" alt="User Profile" class="profile-pic">
            <p>Artkins</p>
            <div class="dropdown-content">
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
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
            <a href="#manage-users">
                <li>
                    <i></i>
                    <p>Manage Users</p>
                </li>
            </a>
            <a href="#approve-loans">
                <li>
                    <i></i>
                    <p>Loans</p>
                </li>
            </a>
            <a href="#generate-reports">
                <li>
                    <i></i>
                    <p>Generate Reports</p>
                </li>
            </a>
            <a href="#register-admin">
                <li>
                    <i></i>
                    <p>Register New Admin</p>
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
            <h2>Dashboard Summary</h2>
            <p>Welcome to your admin dashboard! Here's an overview:</p>
            <ul>
                <li>Total Users: 500</li>
                <li>Active Loans: 120</li>
                <li>Approved Loans: 80</li>
                <li>Revenue Generated: $150,000</li>
            </ul>
        </section>

        <!-- Manage Users Section -->
        <section id="manage-users">
            <h2>Manage Users</h2>
            <!-- User management features (e.g., user list, search, edit, delete) -->
            <!-- Add relevant content here -->
        </section>

        <!-- Loans Section -->
        <section id="approve-loans">
            <h2>Loans</h2>
            <!-- Loan approval features (e.g., pending loans, approve/decline buttons) -->
            <!-- Add relevant content here -->
        </section>

        <!-- Generate Reports Section -->
        <section id="generate-reports">
            <h2>Generate Reports</h2>
            <!-- Report generation options (e.g., date range, loan status, user activity) -->
            <!-- Add relevant content here -->
        </section>

        <!-- Register New Admin Section -->
        <section id="register-admin">
            <h2>Register New Admin</h2>
            <!-- Admin registration form -->
            <!-- Add relevant content here -->
        </section>
    </div>
</div>

<?php include('php/partials/footer.php'); ?>
