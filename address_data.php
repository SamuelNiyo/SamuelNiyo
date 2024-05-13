<?php
// Include the file containing the database connection
include "dbconnection.php";

// Check if the form was submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $address_id = $_POST['address_id'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $location = $_POST['location'];
    $street = $_POST['street'];

    // Prepare SQL query to insert data into the users table
    $sql = "INSERT INTO address (address_id, district, city, location, street) 
            VALUES ('$address_id', '$district', '$city', '$location', '$street')";
    
    // Execute the SQL query
    $result = $connection->query($sql);

    // Check if the query was successful
    if (!$result) {
        // If there's an error, display it
        echo "Error: " . $sql . "<br>" . $connection->error;
    } else {
        // If data was inserted successfully, redirect to users_table.php
        echo "Data Inserted Successfully";
        header("location: address_table.php");
        exit();
    }
}
?>
