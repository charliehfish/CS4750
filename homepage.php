<?php
session_start();

require("connect-db.php");
require("project-db.php");

$selectedDepartment = '';
$selectedCourses = [];
$notes = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['dptBtn'])) {
        $selectedDepartment = $_POST['department'];
        $selectedCourses = getCoursesInDepartment($selectedDepartment);
    } elseif (!empty($_POST['courseBtn'])) {
        $notes = getNotes($_POST['course'], $_POST['averageRating']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Homepage for Our Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }

        #departmentSection,
        #courseSection,
        #notesSection {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #departmentForm,
        #courseForm {
            margin-top: 10px;
        }

        #notesSection p {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Retrieve notes, <a href='addNotes.php'>add your own,</a> or <a href='giveRating.php'>leave a review!</a>
        </h1>
    </header>

    <div id="departmentSection" class="container">
        <h2>Departments</h2>
        <?php if (!$selectedDepartment && !$notes) : ?>
            <form id="departmentForm" method="post" action="">
                <div class="form-group">
                    <label for="department">Select Department:</label>
                    <select id="department" name="department" class="form-control">
                        <?php
                        $departments = getDepartments();
                        foreach ($departments as $department) {
                            echo "<option value='" . $department['departmentName'] . "'>" . $department['departmentName'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <input type="submit" value="Submit" name="dptBtn" class="btn btn-primary">
            </form>
        <?php endif; ?>
    </div>

    <div id="courseSection" class="container">
        <h2>Courses</h2>
        <?php if ($selectedDepartment && !$notes) : ?>
            <form id="courseForm" method="post" action="">
                <div class="form-group">
                    <label for="course">Select Course:</label>
                    <select id="course" name="course" class="form-control">
                        <?php
                        foreach ($selectedCourses as $course) {
                            echo "<option value='" . $course['courseID'] . "'>" . $course['courseID'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="averageRating">Minimum Rating:</label>
                    <input type="number" id="averageRating" name="averageRating" value="<?= $averageRating ?>" min="0" max="5" class="form-control">
                </div>
                <br>
                <input type="submit" value="Get Notes" name="courseBtn" class="btn btn-primary">
            </form>
        <?php endif; ?>
        
    </div>

    <div id="notesSection" class="container">
        <h2>Notes</h2>
        <?php
        if ($notes) {
            foreach ($notes as $note) {
                echo "<p>Description: {$note['description']} <br>";
                echo "Average Rating: {$note['averageRating']} <br>";
                echo "Notes URL: <a href='{$note['notesURL']}'>{$note['notesURL']}</a></p>";
            }
            
        } else {
            echo "<p>No notes found.</p>";
        }
        ?>
        <a href='homepage.php'>Return to start</a>
        <?php
        // Check if the user is not logged in
        if (!isset($_SESSION['email'])) {
            echo "<a href='login.php'>Log In</a>";
            echo "<a href='signup.php'>Sign Up</a>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
