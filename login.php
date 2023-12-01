<?php
// Database connection
$link = mysqli_connect('localhost', 'root', '', 'demo');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Retrieve username and password from form
$uname = $_POST['uname'];
$password = $_POST['password'];

// Query the database
$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$password'";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    // Start the session and redirect to a different page
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $uname;
    header('location: welcome.php');
} else {
    // Redirect back to the login page with an error message
    header('location: login.php?error=Incorrect username or password.');
}
?>
