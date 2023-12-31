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
   if (!empty($_POST['addBtn']))
   {
    addNotes($_POST['courseId'], $_POST['notesUrl'], date('Y-m-d'), $_POST['description'], $_SESSION['studentId']);
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Notes</title>
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
  <h1 class="display-4">Add Your Notes!</h1>
  <form name="notesForm" action="addNotes.php" method="post">
    <div class="row mb-3 mx-3">
     Course ID:
    <input type="text" placeholder='i.e CS4750' class="form-control" name="courseId" required /> 
    </div> 
    <div class="row mb-3 mx-3">
     Notes URL:
    <input type="text" placeholder='i.e https://docs.google.com/document/#####' class="form-control" name="notesUrl" required /> 
    </div> 
    <div class="row mb-3 mx-3">
     Description:
    <input type="text" class="form-control" name="description" required/> 
    </div> 
    <div class="row mb-3 mx-3"> 
    </div>
    <br>
    <center><button value = "Add Notes" type="submit" name="addBtn" class="btn btn-info" style="background-color:#E53E3E">Add Notes</button></center>
</form>
</div>
<hr/>
<div class="container">
    <form action = 'homepage.php'>
        <center><button action="submit" class="btn btn-info" style="background-color:#E53E3E">Return to Menu</button></center>
    </form>
</div>
</body>
</html>
