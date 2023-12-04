<?php
session_start();


$_SESSION['message'] = "You have been logged out.";

// Destroy the session to log the user out and redirect them to the login page!!
if(session_destroy()) {
    header("Location: login.php");
}
?>
