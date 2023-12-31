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
<body style="background-color:#f7f7ff;">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <br>
  <div class="container" style="display: flex;  flex-direction: column; justify-content:center">
  <div style='display: flex; flex-direction: column; align-items: center;'>
  <h1 class="display-4">Sign Up for Notester!</h1>
<form action="signup.php" method="post">
    Student ID: <input type="text" name="studentID" maxlength="15"><br>
    Email: <input type="email" name="email" maxlength="255"><br>
    Password: <input type="password" name="pswd" maxlength="255"><br>
    First Name: <input type="text" name="first_name" maxlength="255"><br>
    Last Name: <input type="text" name="last_name" maxlength="255"><br>
    Year: <input type="number" name="year" min="1"><br>
    <div style='display: flex; justify-content:center;'>
    <input type="submit" value="Sign Up">
    </div>
</form>
</div>
</div>
</body>
</html>