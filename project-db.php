<?php

function getNotes($department, $course, $minRating) {
    global $db;

    $query = "select * from notes 
              where department=:department 
              AND course=:course 
              AND rating>=:minRating";

    $statement->bindValue(':department', $department);
    $statement->bindValue(':course', $course);
    $statement->bindValue(':minRating', $minRating);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}




?>