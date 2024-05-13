<?php 
include "dbconnection.php";
include "menu.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/styleee.css" title="style1" media="screen,tv,print,handheld"/>
    <title>Task Rabbit-like Platform</title>
    <script>
        function confirmInsert() {
            return confirm('Do you want to insert this record?');
        }
    </script>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <section class="forms">
            <form action="bookings_data.php" method="POST" class="sp" onsubmit="return confirmInsert();">
                <h3 style="color:green;">TASKS PROVIDER FORM</h3>
                <label>ID</label>
                <input type="text" name="booking_id" required class="input"><br>
                <div class="form-group">
                    <label for="task_id">Task Id</label>
                    <select id="task_id" class="input" name="task_id">
                        <?php
                        $sql = "SELECT task_id, description FROM tasks";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $task_id = $row['task_id'];
                                $description = $row['description'];
                                echo "<option value=\"$task_id\"> $task_id $description </option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                               <div class="form-group">
                    <label for="serviceprovider_id">Address Id</label>
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
                <div class="form-group">
                    <label for="booking_date">Booking Date</label>
                  <input type="date" name="rating" required class="input"><br><br>  
                <input type="submit" name="submit" value="SUBMIT" class="sb">
                <input type="reset" name="reset" value="CANCEL" class="cn">
            </form>
            <br><br><br><br><br><br><br><br><br><br>
        </section>
    </center><br><br>
    <footer>
        <p>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
