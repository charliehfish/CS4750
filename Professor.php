<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['professorEmail'])) {
    header("Location: login_form.php");
    exit;
}


require("connect-db.php");
require("project-db.php");
$list_of_courses = getCoursesTaught($_SESSION['professorEmail']);
$list_of_feedback = getFeedbackById($_SESSION['professorEmail']);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (!empty($_POST['delBtn']))
   {
    deleteFeedback($_POST['feedbackToDelete'], $_SESSION['professorEmail']);
    $list_of_feedback = getFeedbackById($_SESSION['professorEmail']);
   }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        .table-container {
            width: 100%;
            max-width: 100%;
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #343a40;
            color: #fff;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $_SESSION['professorId'] ?></h1>
        <div class="table-container">
            <h4>Courses Taught</h4>
            <?php foreach ($list_of_courses as $course): ?>
                <li><?php echo $course['courseID']; ?></li>
            <?php endforeach; ?>
            </br>
        </div>
        <div class="table-container">
        <table class="w3-table w3-bordered w3-card-4 center">
            <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>Notes ID</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_of_feedback as $feedback): ?>
                <tr>
                    <td><?php echo $feedback['feedbackID']; ?></td>
                    <td><?php echo $feedback['notesID']; ?></td>
                    <td><?php echo $feedback['description']; ?></td>  
                    <td>
                        <form action="Professor.php" method="post">
                        <input type="submit" value="Delete" name="delBtn" class="btn btn-danger"  />
                        <input type="hidden" name="feedbackToDelete"
                                    value="<?php echo $feedback['feedbackID'];?>"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
<hr/>
<div class="container">
    <form action = 'homepage.php'>
        <center><button action="submit" class="btn btn-info" style="background-color:#E53E3E">Return to Menu</button></center>
    </form>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</html>
