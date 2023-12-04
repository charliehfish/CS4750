<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login_form.php");
    exit;
}



require("connect-db.php");
require("project-db.php");
$list_of_notes = getNotesByStudentId($_SESSION['studentId']);

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
        
        /* Container styles */
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
        <h1>Welcome <?php echo $_SESSION['studentId'] ?></h1>
        <div class="table-container">
        <table class="w3-table w3-bordered w3-card-4 center">
            <thead>
                <tr>
                    <th>Note ID</th>
                    <th>Course ID</th>
                    <th>Link</th>
                    <th>Average Rating</th>
                    <th>Date Created</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_of_notes as $note): ?>
                <tr>
                    <td><?php echo $note['notesID']; ?></td>
                    <td><?php echo $note['courseID']; ?></td>        
                    <td><a href="<?php echo $note['notesURL']; ?>">See Notes</a></td> 
                    <td><?php echo $note['averageRating']; ?></td>        
                    <td><?php echo $note['dateCreated']; ?></td>  
                    <td><?php echo $note['description']; ?></td>  
                    <td><input type="submit" value="Update" class="btn btn-secondary" /></td>
                    <td><input type="submit" value="Delete" class="btn btn-danger"  /></td>
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
