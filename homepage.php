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
        <p>
            Test
        </p>
    <?php endif; ?>



</body>
</html>
