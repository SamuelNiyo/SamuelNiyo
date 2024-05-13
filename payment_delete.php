<?php
if (isset($_GET["paymnet_id"])) {
   $paymnet_id=$_GET["paymnet_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM payments WHERE paymnet_id=$paymnet_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:payment_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>