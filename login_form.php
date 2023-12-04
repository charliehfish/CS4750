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
        $_SESSION['userType'] = "student";
        header("Location: User.php");
        exit;
    } else if ($stmtt->rowCount() > 0) {
        $_SESSION['professorEmail'] = $email; 
        $_SESSION['email'] = $email; 
        $profId = substr($email, 0, strpos($email, '@'));
        $_SESSION['professorId'] = $profId;  
        $_SESSION['userType'] = "professor"; 
        header("Location: Professor.php");
    } else {
        echo "Invalid email or password.";
    }
}
?>

<body style="background-color:#f7f7ff;">
    <br>
  <div class="container" style="display: flex; justify-content:center">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div style='display: flex; flex-direction: column; align-items: center;'>
    <h1> Log in to the Notester or Sign Up! </h1>
        <form action="login_form.php" method="post">
            Email: <input type="email" name="email" maxlength="255" style="width: 100%"><br>
            Password: <input type="password" name="pswd" maxlength="255" style="width: 100%"><br>
            <div style='display: flex; justify-content:center;'>
            <input type="submit" value="Log In">
            </div>
        </form>
        <div style='display: flex; justify-content:center;'>
        <form action = 'signup.php'>
            <center><button action="submit" class="btn btn-info" style="background-color:#E53E3E">Sign Up</button></center>
        </form>            
        </div>
    </div>
</div>
</body>
