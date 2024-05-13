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
    <title>Task rabbit-like platform</title>
    <style>
        body {
            background-image: url('./images/ffff.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <section class="forms">
            <form action="message.php" method="POST" class="sp" onsubmit="return confirmInsert();">
                <h3 style="color:green;">MESSAGE FORM</h3>
                <label>ID</label>
   <input type="text" name="message_id" required class="input"><br>
                <div class="form-group">
                    <label for="user_id">Sender Id</label>
                    <select id="user_id" class="input" name="user_id">
                        <?php
                        $sql = "SELECT user_id, username FROM users";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                echo "<option value=\"$user_id\">$user_id $username</option>";
                            }
                        }
                        ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="user_id">Receiver Id</label>
                    <select id="user_id" class="input" name="user_id">
                        <?php
                        $sql = "SELECT user_id, email FROM users";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $user_id = $row['user_id'];
                                $email = $row['email'];
                                echo "<option value=\"$user_id\">$user_id $email</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <label>Message Content</label>
                <input type="text" name="message_content" required class="input"><br>
                <label>Message Type</label>
                <select name="message_type" class="input">
                    <option value="Text">Text</option>
                    <option value="Image">Image</option>
                    <option value="Video">Video</option>
                    <option value="Audio">Audio</option>
                    <option value="Other">Other</option>
                </select> 
                <label>Message Date</label>
                <input type="date" name="message_date" required class="input"><br><br>
                <input type="submit" name="submit" value="SUBMIT" class="sb">
                <input type="reset" name="reset" value="CANCEL" class="cn">
            </form>
        </section>
    </center>
    <footer>
        <p>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
    <script>
        function confirmInsert() {
            return confirm('Do you want to insert this record?');
        }
    </script>
</body>
</html>
