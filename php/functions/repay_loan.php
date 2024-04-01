<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $payment_amount = mysqli_real_escape_string($conn, $_POST["payment-amount"]);
    $loan_id = mysqli_real_escape_string($conn, $_POST["loan_id"]);
    $loan_amount = mysqli_real_escape_string($conn, $_POST["loan_amount"]);
    $due_date = mysqli_real_escape_string($conn, $_POST["due_date"]);
    $temporary_loan_balance = mysqli_real_escape_string($conn, $_POST["loan_balance"]);
    $loan_type = mysqli_real_escape_string($conn, $_POST["loan_type"]);
    $loan_type_id = mysqli_real_escape_string($conn, $_POST["loan_type_id"]);
    $interest = mysqli_real_escape_string($conn, $_POST["interest"]);
    $temporary_max_loan_amount = mysqli_real_escape_string($conn, $_POST["max_loan_amount"]);

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

    function calculatePenalty($due_date, $new_temporary_loan_balance)
    {
        $penalty = 0;
        if ($due_date < date("Y-m-d") && $new_temporary_loan_balance > 0) {
            $penalty = 10 + $new_temporary_loan_balance;
        }
        return $penalty;
    }

    function getMaxLoanAmountForUser($user_id)
    {
        global $conn;
        $query = "SELECT MAX(max_loan_amount) as max_loan_amount FROM loans WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['max_loan_amount'];
    }

    function calculateMaximumLoanAmount($due_date, $loan_balance, $user_id)
    {
        $max_loan_amount = getMaxLoanAmountForUser($user_id);
        if ($due_date > date("Y-m-d") && $loan_balance == 0) {
            $max_loan_amount = 1000 + $max_loan_amount;
        } elseif ($due_date < date("Y-m-d") && $loan_balance > 0) {
            $max_loan_amount = $max_loan_amount / 2;
        }
        return $max_loan_amount;
    }

    function calculateLoanStatus($loan_balance)
    {
        if ($loan_balance == 0) {
            $loan_status = 'Cleared';
        } else {
            $loan_status = 'In Progress';
        }
        return $loan_status;
    }

    function calculateExtraPayment($temporary_extra_payment)
    {
        if ($temporary_extra_payment > -1) {
            $extra_payment = $temporary_extra_payment;
        } else {
            $extra_payment = 0;
        }
        return $extra_payment;
    }

    // Set other necessary variables
    $user_id = $_SESSION['user_id']; // Assuming you have user_id stored in session
    $transaction_type = 'Payment';
    $date_of_transaction = date("Y-m-d");
    $duration = calculateDuration($loan_amount); // Calculate duration based on loan amount
    $due_date = date('Y-m-d', strtotime($date_of_transaction . ' + ' . $duration . ' days'));
    $payment_date = date("Y-m-d");
    $new_temporary_loan_balance = $temporary_loan_balance - $payment_amount;
    $penalty = calculatePenalty($due_date, $new_temporary_loan_balance); // Calculate penalty
    $loan_balance = $new_temporary_loan_balance + $penalty; // Calculate loan balance
    $max_loan_amount = calculateMaximumLoanAmount($due_date, $loan_balance, $user_id);
    $loan_status = calculateLoanStatus($loan_balance);
    $temporary_extra_payment = $loan_balance - $loan_amount;
    $extra_payment = calculateExtraPayment($temporary_extra_payment);
    $revenue_generated = $extra_payment + $penalty + $interest;

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
