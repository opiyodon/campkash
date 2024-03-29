<?php
include_once '../config.php'; // Include the database connection file

session_start();
session_destroy();
header("Location: " . SITEURL); // Redirect to home page after logout
exit;
