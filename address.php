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
            <form action="address_data.php" method="POST" class="sp" onsubmit="return confirmInsert();">
                <h3 style="color:green;">ADDRESS FORM</h3>
                <label>ID</label>
                <input type="text" name="address_id" required class="input"><br>
                <label>District</label>
                <input type="text" name="district" required class="input"><br>
                <label>City</label>
                <input type="text" name="city" required class="input"><br>
                <label>Location</label>
                <input type="text" name="location" required class="input"><br>
                <label>Street</label>
                <input type="text" name="street" required class="input"><br><br>
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
