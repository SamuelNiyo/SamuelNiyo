<?php  
$servername="localhost";
$username="Sam250";
$password="222008677";
$databasename="task_rabbit_like_platform";
$connection=new mysqli($servername,$username,$password,$databasename);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}
?>