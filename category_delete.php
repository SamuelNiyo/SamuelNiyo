<?php
if (isset($_GET["category_id"])) {
   $category_id=$_GET["category_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM categories WHERE category_id=$category_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:category_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>