# CampKash

## INSTALLATION INSTUCTIONS

Open `phpMyAdmin` on `http://localhost/phpmyadmin/index.php?route=/server/sql` and create a new database called `campkash` in SQL section using this command :

```bash
CREATE DATABASE campkash;
```

Then go ahead and also create tables in the sql section `http://localhost/phpmyadmin/index.php?route=/database/sql&db=campkash` using this command :

1.Users table :

```bash
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(255),
    userProfile VARCHAR(255),
    email VARCHAR(255),
    reset_token VARCHAR(255),
    phone_no VARCHAR(255),
    id_no VARCHAR(255),
    religion VARCHAR(255),
    gender VARCHAR(255),
    reg_no VARCHAR(255),
    dateofbirth DATE DEFAULT CURRENT_TIMESTAMP,
    password VARCHAR(255)
);
```

2.Loans table :

```bash
CREATE TABLE loans (
    id INT AUTO_INCREMENT,
    user_id INT,
    transaction_type VARCHAR(255),
    loan_type VARCHAR(255),
    loan_amount DECIMAL(10, 2),
    max_loan_amount DECIMAL(10, 2),
    loan_status VARCHAR(255),
    date_of_transaction DATE,
    duration INT,
    due_date DATE,
    payment_amount DECIMAL(10, 2),
    payment_date DATE,
    loan_balance DECIMAL(10, 2),
    penalty DECIMAL(10, 2),
    PRIMARY KEY (id)
);
```

### FINALLY

Finally once done open a new tab on your browser and copy this link `http://localhost/campkash/` and this should take you straight to the landing page.

Now you can create your account by going to the register page ,, then you can login.

Enjoying using `CampKash`, your one stop loans app.