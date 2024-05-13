<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $booking_id = $_POST['booking_id'];
    $task_id = $_POST['task_id'];
     $serviceprovider_id = $_POST['serviceprovider_id'];
    $booking_date = $_POST['booking_date'];
    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO bookings (booking_id, task_id, serviceprovider_id, booking_date) 
            VALUES ('$booking_id', '$task_id', '$serviceprovider_id', '$booking_date')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: bookings_table.php");
        exit();
    }
}
?>
