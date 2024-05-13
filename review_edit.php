<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["review_id"])) {
        header("location: /taskrabbit-like platform/_edit.php");
        exit;
    }
    $review_id = $_GET["review_id"];
    $sql = "SELECT * FROM reviews WHERE review_id=$review_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $review_id = $row["review_id"];
        $user_id = $row["user_id"];
        $serviceprovider_id = $row["serviceprovider_id"];
        $rating = $row["rating"];
        $comment = $row["comment"];
        $review_date = $row["review_date"];
    } else {
        header("location: /taskrabbit-like platform/review_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["review_id"]) || empty($_POST["user_id"]) || empty($_POST["serviceprovider_id"]) || empty($_POST["rating"]) || empty($_POST["comment"]) || empty($_POST["review_date"])) {
        echo "All fields are required!";
    } else {
        $review_id = $_POST["review_id"];
        $user_id = $_POST["user_id"];
        $serviceprovider_id = $_POST["serviceprovider_id"];
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];
        $review_date = $_POST["review_date"];
        
        $sql = "UPDATE reviews SET user_id='$user_id', serviceprovider_id='$serviceprovider_id', rating='$rating', comment='$comment', review_date='$review_date' WHERE review_id='$review_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /taskrabbit-like platform/review_table.php");
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
    <link rel="stylesheet" type="text/css" href="./css/stylee.css" title="style1" media="screen,tv,print,handheld"/>
    <title>Task Rabbit-Platform</title>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <h3 style="color:green;">UPDATE review_ids HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="review_id" readonly class="input" value="<?php echo $review_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" class="input" value="<?php echo $user_id; ?>"><br>
                <label>Service-Provider Id</label><br>
                <input type="text" name="serviceprovider_id" class="input" value="<?php echo $serviceprovider_id; ?>"><br> 
                <label>Rating</label><br>
                <input type="text" name="rating" readonly value="<?php echo $rating; ?>" class="input"><br> 
                <label>Comment</label><br>
                <input type="text" name="comment" value="<?php echo $comment; ?>" class="input"><br>  
                <label>Review Date</label><br>
                <input type="date" name="review_date" value="<?php echo $review_date; ?>" class="input"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
