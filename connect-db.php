<?php
    $username = 'chf2pn'; 
    $password = 'Fall2023';
    $host = 'mysql01.cs.virginia.edu';
    $dbname = 'chf2pn_c';
    $dsn = "mysql:host=$host;dbname=$dbname";

    try 
    {
        $db = new PDO($dsn, $username, $password);
        #echo "<p>Connected</p>";
    
    }
    catch (PDOException $e) 
    {
    $error_message = $e->getMessage();        
    echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    catch (Exception $e)      
    {
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
    }

?>