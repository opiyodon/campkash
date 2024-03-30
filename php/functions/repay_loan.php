<?php
include_once '../config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $payment_amount = mysqli_real_escape_string($conn, $_POST["payment-amount"]);
    $loan_id = mysqli_real_escape_string($conn, $_POST["loan_id"]);
    $loan_amount = mysqli_real_escape_string($conn, $_POST["loan_amount"]);
    $due_date = mysqli_real_escape_string($conn, $_POST["due_date"]);
    $loan_balance = mysqli_real_escape_string($conn, $_POST["loan_balance"]);

    function calculatePenalty($due_date, $loan_balance)
    {
        $penalty = 0;
        if ($due_date < date("Y-m-d") && $loan_balance > 0) {
            $penalty = 5 + $loan_balance;
        }
        return $penalty;
    }

    // Set other necessary variables
    $payment_date = date("Y-m-d");
    $penalty = calculatePenalty($due_date, $loan_balance); // Calculate penalty
    $loan_balance = ($loan_amount - $payment_amount) + $penalty; // Calculate loan balance
    $max_loan_amount = 5000; // maximum loan amount

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare("UPDATE loans SET payment_amount = ?, payment_date = ?, penalty = ?, loan_balance = ?, max_loan_amount = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $payment_amount, $payment_date, $penalty, $loan_balance, $max_loan_amount, $loan_id);


    // Execute the query and provide feedback
    if ($stmt->execute()) {
        $_SESSION['loan_repayment'] = "<div class='SUCCESS'>Loan Repayment Successful</div>";
        header('location:' . SITEURL . 'dashboard.php');
    } else {
        $_SESSION['loan_repayment'] = "<div class='ERROR'>Failed to Repay Loan</div>";
        header('location:' . SITEURL . 'dashboard.php');
    }

    $stmt->close(); // Close statement
} else {
    $_SESSION['loan_repayment'] = "<div class='ERROR'>You must submit the form to repay a loan</div>";
    header('location:' . SITEURL . 'dashboard.php');
}

mysqli_close($conn); // Close the database connection
