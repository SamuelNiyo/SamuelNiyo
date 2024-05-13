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
            <form action="payment_data.php" method="POST" class="sp" onsubmit="return confirmInsert();">
                <h3 style="color:green;">PAYMENT FORM</h3>
                <label>ID</label>
                <input type="text" name="payment_id" required class="input"><br>
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
                <label>Amount</label>
                <input type="text" name="amount" required class="input"><br>
                <label>Payment Date</label>
                <input type="date" name="payment_date" required class="input"><br>
                <label>Status</label>
                <select name="status" class="input">
                    <option value="Open">Pending</option>
                    <option value="In Progress">Paid</option>
                    <option value="Completed">Refunded</option>
                </select><br><br>
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
