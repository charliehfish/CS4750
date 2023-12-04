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
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $query = "SELECT * FROM Student WHERE email = ? AND pswd = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email, $pswd]);

    if ($stmt->rowCount() > 0) {
        // Start the session and redirect to user page
        $_SESSION['email'] = $email;
        $studentId = substr($email, 0, strpos($email, '@'));
        $_SESSION['studentId'] = $studentId;
        header("Location: User.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
?>

<form action="login_form.php" method="post">
    Email: <input type="email" name="email" maxlength="255"><br>
    Password: <input type="password" name="pswd" maxlength="255"><br>
    <input type="submit" value="Log In">
</form>
