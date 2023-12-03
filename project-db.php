<?php

function getNotes($courseID, $averageRating) {
    global $db;

    $query = "SELECT * FROM Notes NATURAL JOIN Course 
              WHERE courseID = :courseID 
              AND averageRating >= :averageRating";

    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $courseID);
    $statement->bindValue(':averageRating', $averageRating);

    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
}

function getAllNotes() {
    global $db;

    $query = "SELECT * FROM Notes";

    $statement = $db->prepare($query);
    $statement->execute();
    
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
}

function getDepartments() {
    global $db;

    $query = "SELECT departmentName from Department";
    $statement = $db->prepare($query);
    $statement->execute();
    $departments = $statement->fetchAll();
    $statement->closeCursor();

    return $departments;
}

function getCoursesInDepartment($departmentName) {
    global $db;

    $query = "SELECT *
              FROM Course NATURAL JOIN belongs_to
              WHERE departmentName = :departmentName";

    $statement = $db->prepare($query);
    $statement->bindValue(':departmentName', $departmentName);
    $statement->execute();

    $courses = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $courses;
}






?>