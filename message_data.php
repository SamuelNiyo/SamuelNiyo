<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $message_id = $_POST['message_id'];
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message_content = $_POST['messa$message_content'];
    $message_type = $_POST['message_type'];
    $message_date = $_POST['message_date'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO message (message_id, sender_id, receiver_id, message_content, message_type, message_date) 
            VALUES ('$message_id', '$sender_id', '$receiver_id', '$message_content', '$message_type', '$message_date')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: message_table.php");
        exit();
    }
}
?>
