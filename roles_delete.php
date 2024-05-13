<?php
if (isset($_GET["role_id"])) {
   $role_id=$_GET["role_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM role WHERE role_id=$role_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:roles_tables.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>