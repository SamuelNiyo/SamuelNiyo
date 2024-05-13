<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
     
    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO categories (category_id, category_name) 
            VALUES ('$category_id', '$category_name')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: category_table.php");
        exit();
    }
}
?>
