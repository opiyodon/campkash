<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $loan_type = mysqli_real_escape_string($conn, $_POST["loan_type"]);
    $loan_amount = mysqli_real_escape_string($conn, $_POST["loan_amount"]);

    function calculateDuration($loan_amount)
    {
        if ($loan_amount <= 5000) {
            return 2 * 7; // 2 weeks
        } elseif ($loan_amount <= 10000) {
            return 3 * 7; // 3 weeks
        } elseif ($loan_amount <= 15000) {
            return 4 * 7; // 4 weeks
        } elseif ($loan_amount <= 20000) {
            return 5 * 7; // 5 weeks
        } elseif ($loan_amount <= 25000) {
            return 6 * 7; // 6 weeks
        } elseif ($loan_amount <= 30000) {
            return 7 * 7; // 7 weeks
        } elseif ($loan_amount <= 35000) {
            return 8 * 7; // 8 weeks
        } elseif ($loan_amount <= 40000) {
            return 9 * 7; // 9 weeks
        } elseif ($loan_amount <= 45000) {
            return 10 * 7; // 10 weeks
        } elseif ($loan_amount <= 50000) {
            return 11 * 7; // 11 weeks
        }
    }

    function calculatePenalty($due_date, $temporary_loan_balance)
    {
        $penalty = 0;
        if ($due_date < date("Y-m-d") && $temporary_loan_balance > 0) {
            $penalty = 5 + $temporary_loan_balance;
        }
        return $penalty;
    }

    // Function to generate a unique loan_type_id
    function generateUniqueLoanTypeId($user_id)
    {
        // Create a unique identifier using user ID, current timestamp, and a random number
        $timestamp = time(); // Get current timestamp
        $random_number = mt_rand(10000, 99999); // Generate a random number
        $unique_id = "{$user_id}_{$timestamp}_{$random_number}"; // Combine user ID, timestamp, and random number

        // Hash the unique_id using SHA-256
        $hashed_unique_id = hash('sha256', $unique_id);

        return $hashed_unique_id;
    }

    // Set other necessary variables
    $user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
    $loan_type_id = generateUniqueLoanTypeId($user_id);
    $transaction_type = 'Loan';
    $loan_status = 'Pending';
    $date_of_transaction = date("Y-m-d");
    $duration = calculateDuration($loan_amount); // Calculate duration based on loan amount
    $due_date = date('Y-m-d', strtotime($date_of_transaction . ' + ' . $duration . ' days'));
    $payment_amount = 0;
    $payment_date = null;
    $temporary_loan_balance = $loan_amount - $payment_amount;
    $interest = 2/100 * ($temporary_loan_balance);
    $final_balance = $temporary_loan_balance - $interest;
    $penalty = calculatePenalty($due_date, $temporary_loan_balance); // Calculate penalty
    $loan_balance = $temporary_loan_balance + $penalty;
    $max_loan_amount = 1000; // maximum loan amount
    $revenue_generated = $interest;

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO loans (user_id, transaction_type, loan_type, loan_type_id, loan_amount, max_loan_amount, loan_status, date_of_transaction, duration, due_date, payment_amount, payment_date, loan_balance, penalty, interest, revenue_generated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssisssssss", $user_id, $transaction_type, $loan_type, $loan_type_id, $loan_amount, $max_loan_amount, $loan_status, $date_of_transaction, $duration, $due_date, $payment_amount, $payment_date, $loan_balance, $penalty, $interest, $revenue_generated);

    // Execute the query and provide feedback
    if ($stmt->execute()) {
        header('location:' . SITEURL . 'dashboard.php');
    } else {
        header('location:' . SITEURL . 'dashboard.php');
    }

    $stmt->close(); // Close statement
} else {
    header('location:' . SITEURL . 'dashboard.php');
}

mysqli_close($conn); // Close the database connection
