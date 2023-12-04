<?php
session_start();

// If the user is already logged in... Take them to the homepage
if (isset($_SESSION['email'])) {
    header("Location: homepage.php");
    exit;
}

require("connect-db.php");

// Checks to see if there is a conncection
if ($db === false) {
    die("ERROR: Could not connect. " . $db->errorInfo()[2]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $query = "SELECT * FROM Student WHERE email = ? AND pswd = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email, $pswd]);

    try {
        $queryy = "SELECT * FROM Professor WHERE professorEmail = ? AND pswd = ?";
        $stmtt = $db->prepare($queryy);
        $stmtt->execute([$email, $pswd]);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    if ($stmt->rowCount() > 0) {
        // Start the user state and takes them to the page.
        $_SESSION['email'] = $email;
        $studentId = substr($email, 0, strpos($email, '@'));
        $_SESSION['studentId'] = $studentId;
        header("Location: User.php");
        exit;
    } elseif ($stmtt->rowCount() > 0) {
        $_SESSION['professorEmail'] = $email; 
        $profId = substr($email, 0, strpos($email, '@'));
        $_SESSION['professorId'] = $profId;   
        header("Location: Professor.php");
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
