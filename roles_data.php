<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $role_id = $_POST['role_id'];
    $department = $_POST['department'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $duration = $_POST['duration'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO role (role_id, department, description, requirements, duration) 
            VALUES ('$role_id', '$department', '$description', '$requirements', '$duration')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("requirements: roles_tables.php");
        exit();
    }
}
?>
