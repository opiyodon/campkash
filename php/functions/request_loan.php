<?php
include_once '../config.php'; // Include the database connection file

function calculateLoanAmount($loan_amount, $penalty) {
    if ($penalty == 0) {
        $loan_amount = min($loan_amount * 2, 50000);
    } else {
        $loan_amount = $loan_amount / 2;
    }
    return $loan_amount;
}

function calculateDuration($loan_amount) {
    if ($loan_amount <= 5000) {
        return 2*7; // 2 weeks
    } elseif ($loan_amount <= 10000) {
        return 3*7; // 3 weeks
    } elseif ($loan_amount <= 15000) {
        return 4*7; // 4 weeks
    } elseif ($loan_amount <= 20000) {
        return 5*7; // 5 weeks
    } elseif ($loan_amount <= 25000) {
        return 6*7; // 6 weeks
    } elseif ($loan_amount <= 30000) {
        return 7*7; // 7 weeks
    } elseif ($loan_amount <= 35000) {
        return 8*7; // 8 weeks
    } elseif ($loan_amount <= 40000) {
        return 9*7; // 9 weeks
    } elseif ($loan_amount <= 45000) {
        return 10*7; // 10 weeks
    } elseif ($loan_amount <= 50000) {
        return 11*7; // 11 weeks
    }
}

function calculatePenalty($due_date, $loan_balance) {
    $penalty = 0;
    if ($due_date < date("Y-m-d") && $loan_balance > 0) {
        $penalty = 5 + $loan_balance;
    }
    return $penalty;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $loan_type = mysqli_real_escape_string($conn, $_POST["loan_type"]);
    $loan_amount = mysqli_real_escape_string($conn, $_POST["loan_amount"]);

    // Set other necessary variables
    $user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
    $transaction_type = 'Loan';
    $loan_status = 'Pending';
    $date_of_transaction = date("Y-m-d");
    $duration = calculateDuration($loan_amount); // Calculate duration based on loan amount
    $due_date = date('Y-m-d', strtotime($date_of_transaction. ' + '.$duration.' days'));
    $payment_amount = 0;
    $payment_date = null;
    $penalty = calculatePenalty($due_date, $loan_balance); // Calculate penalty
    $loan_balance = ($loan_amount - $payment_amount) + $penalty; // Calculate loan balance
    $max_loan_amount = 5000; // maximum loan amount

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("INSERT INTO loans (user_id, transaction_type, loan_type, loan_amount, max_loan_amount, loan_status, date_of_transaction, duration, due_date, payment_amount, payment_date, loan_balance, penalty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssisssss", $user_id, $transaction_type, $loan_type, $loan_amount, $max_loan_amount, $loan_status, $date_of_transaction, $duration, $due_date, $payment_amount, $payment_date, $loan_balance, $penalty);

    // Execute the query and provide feedback
    if ($stmt->execute()) {
        $_SESSION['loan_request'] = "<div class='SUCCESS'>Loan Request Submitted Successfully</div>";
        header('location:' . SITEURL . 'dashboard.php');
    } else {
        $_SESSION['loan_request'] = "<div class='ERROR'>Failed to Submit Loan Request</div>";
        header('location:' . SITEURL . 'dashboard.php');
    }

    $stmt->close(); // Close statement
} else {
    $_SESSION['loan_request'] = "<div class='ERROR'>You must submit the form to request a loan</div>";
    header('location:' . SITEURL . 'dashboard.php');
}

mysqli_close($conn); // Close the database connection
