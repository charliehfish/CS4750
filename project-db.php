<?php

// function getNotes($courseName, $averageRating) {
//     global $db;

//     $query = "SELECT * FROM Notes NATURAL JOIN Course 
//               WHERE courseName = :courseName 
//               AND averageRating >= :averageRating";

//     $statement = $db->prepare($query);
//     $statement->bindValue(':courseName', $courseName);
//     $statement->bindValue(':averageRating', $averageRating);

//     $statement->execute();
//     $results = $statement->fetchAll();
//     $statement->closeCursor();
    
//     return $results;
// }

function getAllNotes() {
    global $db;

    $query = "SELECT * FROM Notes";

    $statement = $db->prepare($query);
    $statement->execute();
    
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
}

// function getDepartments() {
//     global $db;

//     $query = "SELECT departmentName from Department";
//     $statement = $db->prepare($query);
//     $statement->execute();
//     $departments = $statement->fetchAll(PDO::FETCH_COLUMN);
//     $statement->closeCursor();

//     return $departments;
// }

// function getCoursesInDepartment($departmentName) {
//     global $db;

//     $query = "SELECT *
//               FROM Course NATURAL JOIN belongs_to
//               WHERE departmentName = :departmentName";

//     $statement = $db->prepare($query);
//     $statement->bindValue(':departmentName', $departmentName);
//     $statement->execute();

//     $courses = $statement->fetchAll(PDO::FETCH_ASSOC);
//     $statement->closeCursor();

//     return $courses;
// }

function addNotes($courseId, $notesUrl, $date, $description, $studentId) {
    global $db;
    try {
        $query = "SELECT * FROM Notes";
        $notes_stmt = $db->prepare($query);
        $notes_stmt->execute();
        $count = 0;
        while ($notes_stmt->fetch()) {
            $count++;
        }
        $notes_id = $count+1;

        $query = "INSERT INTO Notes VALUES (:notesID, :averageRating, :studentID, :notesURL, :dateCreated, :courseID, :descr)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':notesID', $notes_id);
        $stmt->bindValue(':averageRating', null);
        $stmt->bindValue(':studentID', $studentId);
        $stmt->bindValue(':notesURL', $notesUrl);
        $stmt->bindValue(':dateCreated', $date);
        $stmt->bindValue(':courseID', $courseId);
        $stmt->bindValue(':descr', $description);
        $stmt->execute();
        $stmt->closeCursor();

        echo "Notes added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function rateNotes($notesId, $rating, $raterId) {
    global $db;
    try {
        $query = "INSERT INTO Rates VALUES (:raterId, :notesId, :rating)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':raterId', $raterId);
        $stmt->bindValue(':notesId', $notesId);
        $stmt->bindValue(':rating', $rating);
        $stmt->execute();
        $stmt->closeCursor();

        echo "Your rating has been added successfully!";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
            echo "Not a valid Student ID. Please try again!";
        } else {
            echo "You have already rated these notes!";
        }
    }
}

?>