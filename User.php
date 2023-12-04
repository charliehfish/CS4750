<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Your user page content goes here
echo "Welcome, " . $_SESSION['email'];
?>
