<?php
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

    $query = "INSERT INTO users (studentID, email, pswd, first_name, last_name, year) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$studentID, $email, $pswd, $first_name, $last_name, $year]);
}
?>

<form action="signup.php" method="post">
    Student ID: <input type="text" name="studentID" maxlength="15"><br>
    Email: <input type="email" name="email" maxlength="255"><br>
    Password: <input type="password" name="pswd" maxlength="255"><br>
    First Name: <input type="text" name="first_name" maxlength="255"><br>
    Last Name: <input type="text" name="last_name" maxlength="255"><br>
    Year: <input type="number" name="year" min="1"><br>
    <input type="submit" value="Sign Up">
</form>
