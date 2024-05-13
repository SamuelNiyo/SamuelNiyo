<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $payment_id = $_POST['payment_id'];
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $status = $_POST['status'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO payments (payment_id, user_id, amount, payment_date, status) 
            VALUES ('$payment_id', '$user_id', '$amount', '$payment_date', '$status')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("payment_date: payment_table.php");
        exit();
    }
}
?>
