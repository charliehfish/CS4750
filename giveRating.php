<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login_form.php");
    exit;
}

require("connect-db.php");
require("project-db.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (!empty($_POST['rateBtn']))
   {
    rateNotes($_POST['notesId'], $_POST['rating'], $_SESSION['studentId']);
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Give Rating</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
tr {
    border-bottom: 2px solid #ddd;
}
th {
  color: white;
}
tr:nth-child(even) {
  background-color: #e6e6e6;
}
tr:hover {background-color: #D6EEEE;}
table {
  border: 1px solid black;
  padding: 1px;
}
</style>
<body style="background-color:#f7f7ff;">
    <br>
  <div class="container">
  <h1 class="display-4">Rate these Notes!</h1>
  <form name="ratingForm" action="giveRating.php" method="post">
    <div class="row mb-3 mx-3">
     Notes ID:
    <input type="text" class="form-control" name="notesId" required /> 
    </div> 
    <div class="row mb-3 mx-3">
     Rating (1-5 only integers):
    <input type="text" class="form-control" name="rating" required /> 
    </div> 
    <br>
    <center><button value = "Submit Rating" type="submit" name="rateBtn" class="btn btn-info" style="background-color:#E53E3E">Submit Rating</button></center>
</form>
</div>
<hr/>
<div class="container">
    <form action = 'homepage.php'>
        <center><button action="submit" class="btn btn-info" style="background-color:#E53E3E">Return to Menu</button></center>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
