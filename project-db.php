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

function updateRating($notesId, $rating, $raterId) {
    global $db;
    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE Rates SET ratingScore = :rating WHERE notesID = :notesId AND studentID = :raterId");
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':notesId', $notesId);
        $stmt->bindParam(':raterId', $raterId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Rating updated successfully!";
        } else {
            echo "No rows were updated. Make sure the provided IDs exist.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function provideFeedback($email, $feedback) {
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

        $query = "INSERT INTO Provides VALUES (:profEmail, :feedbackID)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':profEmail', $email);
        $stmt->bindValue(':feedbackID', $fb_id);
        $stmt->execute();
        $stmt->closeCursor();

        $query = "INSERT INTO Feedback VALUES (:feedbackID, :description)";
        
        $stmt = $db->prepare($query);
        $stmt->bindValue(':feedbackID', $fb_id);
        $stmt->bindValue(':description', $feedback);
        $stmt->execute();

        echo "Feedback added successfully!";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
            echo "Not a recognized Professor email. Please try again!";
        } else {
            echo "Error in adding feedback". $e->getMessage();;
        }
    }
}

// function deleteNotes($notesId, $studentId) {
//     global $db;
//     try {
//         // Prepare and execute the SQL delete statement
//         $stmt = $db->prepare("DELETE FROM Notes WHERE notesID = :notesId AND studentID = :studentId");
//         $stmt->bindParam(':notesId', $notesId);
//         $stmt->bindParam(':studentId', $studentId);
//         $stmt->execute();

//         if ($stmt->rowCount() > 0) {
//             echo "Record deleted successfully!";
//         } else {
//             echo "No matching record found to delete.";
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

function deleteNotes($notesId, $studentId) {
    global $db;
    try {
        // Check if the provided notesId and studentId pair exists in Notes table
        $checkStmt = $db->prepare("SELECT COUNT(*) as count FROM Notes WHERE notesID = :notesId AND studentID = :studentId");
        $checkStmt->bindParam(':notesId', $notesId);
        $checkStmt->bindParam(':studentId', $studentId);
        $checkStmt->execute();
        $result = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            // Delete related records from Rates table
            $deleteRatesStmt = $db->prepare("DELETE FROM Rates WHERE notesID = :notesId");
            $deleteRatesStmt->bindParam(':notesId', $notesId);
            $deleteRatesStmt->execute();

            // Delete row from Notes table if related records have been deleted
            if ($deleteRatesStmt->rowCount() > 0) {
                $deleteNotesStmt = $db->prepare("DELETE FROM Notes WHERE notesID = :notesId AND studentID = :studentId");
                $deleteNotesStmt->bindParam(':notesId', $notesId);
                $deleteNotesStmt->bindParam(':studentId', $studentId);
                $deleteNotesStmt->execute();

                if ($deleteNotesStmt->rowCount() > 0) {
                    echo "Record deleted successfully!";
                } else {
                    echo "Error deleting record from Notes table.";
                }
            } else {
                echo "No related records found in Rates table.";
            }
        } else {
            echo "Invalid notesId and studentId pair in Notes table.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>