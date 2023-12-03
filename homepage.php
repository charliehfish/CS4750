<?php
require("connect-db.php");
require("project-db.php");

$selectedDepartment = '';
$selectedCourses = [];
$notes = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['dptBtn'])) {
        $selectedDepartment = $_POST['department'];

        $selectedCourses = getCoursesInDepartment($selectedDepartment);
    }
    else if (!empty($_POST['courseBtn'])) {
        $notes = getNotes($_POST['course'], $_POST['averageRating']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Homepage for Our Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<header>
    <h1>Retrieve Notes!</h1>
</header>
<body>
    <?php if (!$selectedDepartment && !$notes) : ?>
        <form id="departmentForm" method="post" action="">
            <label for="department">Select Department:</label>
            <select id="department" name="department">
                <?php
                $departments = getDepartments();
                foreach ($departments as $department) {
                    echo "<option value='" . $department['departmentName'] . "'>" . $department['departmentName'] . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Submit" name="dptBtn">
        </form>
    <?php endif; ?>

    <?php if ($selectedDepartment && !$notes) : ?>
        <form id="courseForm" method ="post" action="">
            <label for="course">Select Course:</label>
            <select id="course" name="course">
                <?php
                foreach ($selectedCourses as $course) {
                    echo "<option value='" . $course['courseID'] . "'>" . $course['courseID'] . "</option>";
                }
                ?>
            </select>
            <label for="averageRating">Minimum Rating:</label>
            <input type="number" id="averageRating" name="averageRating" value="<?= $averageRating ?>" min="0" max="5">
            <br>
            <input type="submit" value="Get Notes" name="courseBtn">
        </form>
    <?php endif; ?>

                
    <?php
    if ($notes) {
        foreach($notes as $note) {
            echo "<p>Description: {$note['description']} <br>";
            echo "Average Rating: {$note['averageRating']} <br>";
            echo "Notes URL: <a href='{$note['notesURL']}'>{$note['notesURL']}</a></p>";
        }
    } else {
        echo "No notes selected.";
    }
    ?> 


</body>
</html>
