<?php
// Include constants.php file here
include 'php/config.php';

// Destroy the Session
session_unset(); // Unsets all session variables

// Redirect to Login Page
header('location:' . SITEURL);
ob_end_flush();
