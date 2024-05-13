<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $review_id = $_POST['review_id'];
    $user_id = $_POST['user_id'];
    $serviceprovider_id = $_POST['serviceprovider_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $review_date = $_POST['review_date'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO reviews (review_id, user_id, serviceprovider_id, rating, comment, review_date) 
            VALUES ('$review_id', '$user_id', '$serviceprovider_id', '$rating', '$comment', '$review_date')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: review_table.php");
        exit();
    }
}
?>
