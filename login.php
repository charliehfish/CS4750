<?php
$link = mysqli_connect('localhost', 'root', '', 'demo');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Retrieve email, username, last name, and password from form
$email = $_POST['email'];
$uname = $_POST['uname'];
$lname = $_POST['lname'];
$password = $_POST['password'];

// Query the database
$sql = "SELECT * FROM users WHERE email = '$email' AND username = '$uname' AND last_name = '$lname' AND password = '$password'";
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
