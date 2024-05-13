<?php
include "dbconnection.php";

$booking_id = $task_id = $serviceprovider_id = $booking_date = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["booking_id"])) {
        header("location: /taskrabbit-like platform/bookings_edit.php");
        exit;
    }
    $booking_id = $_GET["booking_id"];
    $sql = "SELECT * FROM bookings WHERE booking_id=$booking_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $booking_id = $row["booking_id"];
        $task_id = $row["task_id"];
        $serviceprovider_id = $row["serviceprovider_id"];
        $booking_date = $row["booking_date"];
    } else {
        header("location: /taskrabbit-like platform/bookings_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["booking_id"]) || empty($_POST["task_id"]) || empty($_POST["serviceprovider_id"]) || empty($_POST["booking_date"])) {
        echo "All fields are required!";
    } else {
        $booking_id = $_POST["booking_id"];
        $task_id = $_POST["task_id"];
        $serviceprovider_id = $_POST["serviceprovider_id"];
        $booking_date = $_POST["booking_date"];
        $sql = "UPDATE bookings SET task_id='$task_id', serviceprovider_id='$serviceprovider_id', booking_date='$booking_date' WHERE booking_id='$booking_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /taskrabbit-like platform/bookings_table.php");
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
                <input type="text" name="booking_id" readonly class="input" value="<?php echo $booking_id; ?>"><br>
                <label>Task Id</label><br>
                <input type="text" name="task_id" class="input" value="<?php echo $task_id; ?>"><br>
                <label>Service Provider Id</label><br>
                <input type="text" name="serviceprovider_id" class="input" value="<?php echo $serviceprovider_id; ?>"><br> 
                <label>Booking Date</label><br>
                <input type="date" name="booking_date" class="input" value="<?php echo $booking_date; ?>"><br> 
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
