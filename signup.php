<?php
session_start();

// If the user is already logged in, redirect to the homepage
if (isset($_SESSION['email'])) {
    header("Location: homepage.php");
    exit;
}

require("connect-db.php");

// Check connection
if ($db === false) {
    die("ERROR: Could not connect. " . $db->errorInfo()[2]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $year = $_POST['year'];

    // Check if a user with the provided email already exists
    $query = "SELECT * FROM Student WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "An account with this email already exists.";
    } else {
        $query = "INSERT INTO Student (studentID, email, pswd, first_name, last_name, year) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$studentID, $email, $pswd, $first_name, $last_name, $year]);
    }

    header("Location: homepage.php");
    exit();
}
?>

<form action="signup.php" method="post">
    Student ID: <input type="text" name="studentID" maxlength="15"><br>
    Email: <input type="email" name="email" maxlength="255"><br>
    Password: <input type="password" name="pswd" maxlength="255"><br>
    First Name: <
