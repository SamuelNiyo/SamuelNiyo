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
            <form action="category_data.php" method="POST" class="sp" onsubmit="return confirmInsert();">
                <h3 style="color:green;">TASKS PROVIDER FORM</h3>
                <label>ID</label>
                <input type="text" name="category_id" required class="input"><br>
                <div class="form-group">
                    <label for="category_name">Task Id</label>
                    <select id="category_name" class="input" name="category_name">
                        <?php
                        $sql = "SELECT category_name FROM categories";
                        $result = $connection->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $category_name = $row['category_name'];
                                echo "<option value=\"$category_name\"> $category_name </option>";
                            }
                        }
                        ?>
                    </select>
                </div>
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
