<?php
session_start();

// If the user is already logged in... Take them to the homepage
if (isset($_SESSION['email'])) {
    header("Location: homepage.php");
    exit;
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