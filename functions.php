<?php
function addNotes()
{
    
    // $query = "INSERT INTO Notes VALUES  (:notesID, :averageRating, :studentID, :notesURL, :dateCreated, :courseID, :description)"
    // $stmt = $db_connection->prepare("SELECT * FROM `Notes`");
    // $stmt->execute();
    // $notes = $stmt->get_result();
    // $notes_id = mysqli_num_rows($notes) + 1;
    // $statement = $db->prepare($query); 
    // $statement->bindValue(':notesID', $notes_id);
    // $statement->bindValue(':averageRating', null) ;
    // $statement->bindValue(':studentID', 'testing');
    // $statement->bindValue(':notesURL', $notesUrl);
    // $statement->bindValue(':dateCreated', $date);
    // $statement->bindValue(':courseID', $courseId);
    // $statement->bindValue(':description', $description);
    // $statement->execute();
    // $statement->closeCursor();
    // $stmt = $db_connection->prepare("INSERT INTO Notes VALUES (17, 2, 'ay3xqa', 'asdfjkj', 123, CS4123, 'asdf')");
    // $stmt->execute();
    $stmt = $db_connection->prepare("INSERT INTO Course VALUES ('AA123','some test')");
    $stmt->execute();

}
// function addFriend($friendname, $major, $year) 
// {
//   global $db; 
// //   $query = "insert into friends values ('" . $friendname . "', '" . $major . "'," . $year .") ";
//   // $db->query($query);  // compile + exe

//   $query = "insert into friends values (:friendname, :major, :year) ";
//   // prepare: 
//   // 1. prepare (compile) 
//   // 2. bindValue + exe

//   $statement = $db->prepare($query); 
//   $statement->bindValue(':friendname', $friendname);
//   $statement->bindValue(':major', $major);
//   $statement->bindValue(':year', $year);
//   $statement->execute();
//   $statement->closeCursor();
// }

// function getAllFriends()
// {
//   global $db;
//   $query = "select * from friends";
//   $statement = $db->prepare($query); 
//   $statement->execute();
//   $results = $statement->fetchAll();   // fetch()
//   $statement->closeCursor();
//   return $results;
// }
?>