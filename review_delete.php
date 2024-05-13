<?php
if (isset($_GET["review_id"])) {
   $review_id=$_GET["review_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM service_providers WHERE review_id=$review_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:review_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>