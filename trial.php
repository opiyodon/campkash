<div>
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
                <form id="update-status-form" action="php/functions/update_status.php" method="POST">
                    <label for="loan_status">Loan Status:</label>
                    <select id="loan_status" name="loan_status" class="dashboard-input" required>
                        <option>Select Loan Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Under Review">Under Review</option>
                        <option value="Approved">Approved</option>
                        <option value="Declined">Declined</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Cleared">Cleared</option>
                    </select>
                    <input type="hidden" id="loan_id" name="loan_id" value="<?php echo $recent_loan['id']; ?>">
                    <input type="hidden" id="loan_amount" name="loan_amount"
                        value="<?php echo $recent_loan['loan_amount']; ?>">
                    <input type="hidden" id="payment_amount" name="payment_amount"
                        value="<?php echo $recent_loan['payment_amount']; ?>">
                    <input type="hidden" id="due_date" name="due_date" value="<?php echo $recent_loan['due_date']; ?>">
                    <input type="hidden" id="loan_balance" name="loan_balance"
                        value="<?php echo $recent_loan['loan_balance']; ?>">
                    <input type="hidden" id="loan_type" name="loan_type" value="<?php echo $recent_loan['loan_type']; ?>">
                    <input type="hidden" id="loan_type_id" name="loan_type_id"
                        value="<?php echo $recent_loan['loan_type_id']; ?>">
                    <button class="repay-button">
                        Update Status
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>