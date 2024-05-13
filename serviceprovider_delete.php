<?php
if (isset($_GET["serviceprovider_id"])) {
   $serviceprovider_id=$_GET["serviceprovider_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM service_providers WHERE serviceprovider_id=$serviceprovider_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:serviceprovider_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>