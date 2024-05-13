<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["message_id"])) {
        header("Location: /taskrabbit-like platform/maessage_edit.php");
        exit;
    }
    $message_id = $_GET["message_id"];
    $sql = "SELECT * FROM message WHERE message_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $message_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $message_id = $row["message_id"];
        $sender_id = $row["sender_id"];
        $receiver_id = $row["receiver_id"];
        $message_content = $row["message_content"];
        $message_type = $row["message_type"];
        $message_date = $row["message_date"];
    } else {
        header("Location: /taskrabbit-like platform/message_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["message_id"]) || empty($_POST["sender_id"]) || empty($_POST["receiver_id"]) || empty($_POST["message_content"]) || empty($_POST["message_type"]) || empty($_POST["message_date"])) {
        echo "All fields are required!";
    } else {
        $message_id = $_POST["message_id"];
        $sender_id = $_POST["sender_id"];
        $receiver_id = $_POST["receiver_id"];
        $message_content = $_POST["message_content"];
        $message_type = $_POST["message_type"];
        $message_date = $_POST["message_date"];

        $sql = "UPDATE message SET sender_id=?, receiver_id=?, message_content=?, message_type=?, message_date=? WHERE message_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iisssi", $sender_id, $receiver_id, $message_content, $message_type, $message_date, $message_id);
        
        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("Location: /taskrabbit-like platform/message_table.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/stylee.css" title="style1" media="screen,tv,print,handheld"/>
    <title>Task Rabbit-Platform</title>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <h3 style="color:green;">UPDATE MESSAGE HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="message_id" readonly class="input" value="<?php echo $message_id; ?>"><br>
                <label>Sender Id</label><br>
                <input type="text" name="sender_id" class="input" value="<?php echo $sender_id; ?>"><br>
                <label>Receiver Id</label><br>
                <input type="text" name="receiver_id" class="input" value="<?php echo $receiver_id; ?>"><br> 
                <label>Message Content</label><br>
                <input type="text" name="message_content" class="input" value="<?php echo $message_content; ?>"><br> 
                <label>Message Type</label><br>
                <input type="text" name="message_type" value="<?php echo $message_type; ?>" class="input"><br>  
                <label>Registration Date</label><br>
                <input type="date" name="message_date" value="<?php echo $message_date; ?>" class="input"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
</body>
</html>
