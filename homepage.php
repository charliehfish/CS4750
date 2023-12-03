<?php
require("connect-db.php");
require("project-db.php");

$selectedDepartment = '';
$selectedCourses = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['dptBtn'])) {
        $selectedDepartment = $_POST['department'];

        $selectedCourses = getCoursesInDepartment($selectedDepartment);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage for Our Project</title>
</head>
<body>
    <?php if (!$selectedDepartment) : ?>
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

    <?php if ($selectedDepartment) : ?>
        <form id="courseForm" method ="post" action="">
            <label for="course">Select Course:</label>
            <select id="coruse" name="course">
                <?php
                foreach ($selectedCourses as $course) {
                    echo "<option value='" . $course['courseName'] . "'>" . $course['courseName'] . "</option>";
                }
                ?>
            </select>
            <label for="averageRating">Minimum Rating:</label>
            <input type="number" id="averageRating" name="averageRating" value="<?= $averageRating ?>" min="0" max="5">
            <br>
            <input type="submit" value="Get Notes" name="courseBtn">
        </form>
    <?php endif; ?>



</body>
</html>
