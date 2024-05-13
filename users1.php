<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $user_type = $_POST['user_type'];
    $registration_date = $_POST['registration_date'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO users (user_id, username, email, password, user_type, registration_date) 
            VALUES ('$user_id', '$username', '$email', '$password', '$user_type', '$registration_date')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: users_table.php");
        exit();
    }
}
?>
