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

function getNotesByStudentId($studentId) {
    global $db;

    $query = "SELECT * FROM Notes WHERE studentID = :studentId;";

    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId);
    $statement->execute();
    
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
}

function getFeedbackById($professorEmail) {
    global $db;

    $query = "SELECT * FROM Feedback NATURAL JOIN Provides WHERE professorEmail = :profEmail;";

    $statement = $db->prepare($query);
    $statement->bindValue(':profEmail', $professorEmail);
    $statement->execute();
    
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
}

function getMajorYear($studentId) {
    global $db;

    $query = "SELECT * FROM Student NATURAL JOIN Student_Major WHERE studentID = :studentId;";

    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId);
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

function getCoursesTaught($professorEmail) {
    global $db;

    $query = "SELECT courseID from teaches WHERE professorEmail = :profEmail";
    $statement = $db->prepare($query);
    $statement->bindValue(':profEmail', $professorEmail);
    $statement->execute();
    
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    return $results;
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
        } 
        else if (strpos($e->getMessage(), 'CONSTRAINT') !== false){
            echo "Please enter a rating within 1-5!";
        }
        else {
            echo "You have already rated these notes!";
        } 

    }
}

function updateRating($notesId, $rating, $raterId) {
    global $db;
    try {
        $stmt = $db->prepare("UPDATE Rates SET ratingScore = :rating WHERE notesID = :notesId AND studentID = :raterId");
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':notesId', $notesId);
        $stmt->bindParam(':raterId', $raterId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Rating updated successfully!";
        } 
        else {
            echo "You have already rated these notes!";
        }
    } 
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}   

function provideFeedback($email, $notesId, $feedback) {
    global $db;
    try {
        $query = "SELECT * FROM Feedback";
        $fb_stmt = $db->prepare($query);
        $fb_stmt->execute();
        $count = 0;
        while ($fb_stmt->fetch()) {
            $count++;
        }
        $fb_id = $count+1;
        $query = "INSERT INTO Feedback VALUES (:feedbackID, :notesID, :description)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':feedbackID', $fb_id);
        $stmt->bindValue(':notesID', $notesId);
        $stmt->bindValue(':description', $feedback);
        $stmt->execute();

        $query = "INSERT INTO Provides VALUES (:profEmail, :feedbackID)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':profEmail', $email);
        $stmt->bindValue(':feedbackID', $fb_id);
        $stmt->execute();
        $stmt->closeCursor();



        echo "Feedback added successfully!";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
            echo $e->getMessage();//"Not a recognized Professor email. Please try again!";
        } else {
            echo "Error in adding feedback". $e->getMessage();;
        }
    }
}

function deleteNotes($notesId, $studentId) {
    global $db;
    try {
        $deleteNotesStmt = $db->prepare("DELETE FROM Notes WHERE notesID = :notesId AND studentID = :studentId");
        $deleteNotesStmt->bindParam(':notesId', $notesId);
        $deleteNotesStmt->bindParam(':studentId', $studentId);
        $deleteNotesStmt->execute();
        if ($deleteNotesStmt->rowCount() > 0) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record from Notes table.";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteFeedback($feedbackId, $professorEmail) {
    global $db;
    try {
        $deleteFeedbackStmt = $db->prepare("DELETE FROM Provides WHERE feedbackID = :feedbackId AND professorEmail = :profEmail");
        $deleteFeedbackStmt->bindParam(':feedbackId', $feedbackId);
        $deleteFeedbackStmt->bindParam(':profEmail', $professorEmail);
        $deleteFeedbackStmt->execute();
        if ($deleteFeedbackStmt->rowCount() > 0) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record from Feedback table.";
        }
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>