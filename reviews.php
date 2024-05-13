<?php 
include"dbconnection.php";
include"menu.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/styleee.css" title="style1" media="screen,tv,print,handheld"/>
	<title>Task rabit-like platform</title>
			<script>
		function confirmInsert(){
			return confirm('Do you want to insert this record?');
		}
	</script>
</head>
<style>
	<style>
  body{
   background-image: url('./images/images.jpeg');
   background-repeat: no-repeat;
   background-size: cover;
  }
</style>
<body>
<center>
	
	<h2>TASK RABBIT-LIKE PLATFORM </h2>
	<section class="forms">
<form action="reviews_data.php" method="POST" class="sp" onsubmit="return confirmInsert();">
	<h3 style="color:green;">REVIEW FORM</h3>
    <label>Review Id</label>
   <input type="text" name="review_id" required class="input"> 
                <div class="form-group">
                    <label for="user_id">User Id</label>
                    <select id="user_id" class="input" name="user_id">
                        <?php
                        $sql = "SELECT user_id, username FROM users";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                echo "<option value=\"$user_id\"> $user_id $username </option>";
                            }
                        }
                        ?>
                    </select>
                </div> 
         <div class="form-group">
                    <label for="serviceprovider_id">Service Provider Id</label>
                    <select id="serviceprovider_id" class="input" name="serviceprovider_id">
                        <?php
                        $sql = "SELECT serviceprovider_id, description FROM service_providers";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $serviceprovider_id = $row['serviceprovider_id'];
                                $description = $row['description'];
                                echo "<option value=\"$serviceprovider_id\"> $serviceprovider_id $description </option>";
                            }
                        }
                        ?>
                    </select>
                </div> 
    <label>Rating</label>
    <input type="text" name="rating" required class="input"><br>
    <label>Comment</label>
    <input type="text" name="comment" class="input" required><br> 
    <label>Review Date</label>
    <input type="date" name="review_date" required class="input"><br><br>
    <input type="submit" name="submit" value="SUBMIT" class="sb">
    <input type="reset" name="reset" value="CANCEL" class="cn">
</form><br><br><br><br><br><br><br><br><br><br>
</section>
</center><br><br>
		<footer>
    <p>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>

</body>
</html>