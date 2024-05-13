<?php
if (isset($_GET["booking_id"])) {
   $booking_id=$_GET["booking_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM bookings WHERE booking_id=$booking_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:bookings_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>