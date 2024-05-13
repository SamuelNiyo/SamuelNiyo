<?php
include "dbconnection.php";

$category_id = $category_name = $serviceprovider_id = $booking_date = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["category_id"])) {
        header("location: /taskrabbit-like platform/category_edit.php");
        exit;
    }
    $category_id = $_GET["category_id"];
    $sql = "SELECT * FROM categories WHERE category_id=$category_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_id = $row["category_id"];
        $category_name = $row["category_name"];
    } else {
        header("location: /taskrabbit-like platform/category_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["category_id"]) || empty($_POST["category_name"])) {
        echo "All fields are required!";
    } else {
        $category_id = $_POST["category_id"];
        $category_name = $_POST["category_name"];
        $sql = "UPDATE categories SET category_name='$category_name' WHERE category_id='$category_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /taskrabbit-like platform/category_table.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/stylee.css" media="screen,tv,print,handheld"/>
    <title>Task Rabbit-Platform</title>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <h3 style="color:green;">UPDATE SERVICE REQUESTED HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="category_id" readonly class="input" value="<?php echo $category_id; ?>"><br>
                <div class="form-group">
                    <label for="category_name">Task Id</label><br>
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
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
