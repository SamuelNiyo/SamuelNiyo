<?php
if (isset($_GET["address_id"])) {
   $address_id=$_GET["address_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM address WHERE address_id=$address_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:address_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>