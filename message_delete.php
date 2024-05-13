<?php
if (isset($_GET["message_id"])) {
   $message_id=$_GET["message_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM message WHERE message_id=$message_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:message_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>