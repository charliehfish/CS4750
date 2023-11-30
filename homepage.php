<?php
require("connect-db.php");
require("project-db.php");

$allNotes = getAllNotes();

$course = "testCourse";
$minRating = 0;

#$notes = getNotes($course, $minRating);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage for Our Project</title>
</head>
<body>
    <form id="departmentForm" method="post" action="">
        <label for="department">Select Department:</label>
        <select id="department" name="department">
            <?php
            $departments = getDepartments();
            foreach ($departments as $department) {
                echo "<option value=\"$department\">$department</option>";
            }
            ?>
        </select>
        <br>

        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>