<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["paymnet_id"])) {
        header("payment_date: /taskrabbit-like platform/payment_edit.php");
        exit;
    }
    $paymnet_id = $_GET["paymnet_id"];
    $sql = "SELECT * FROM payments WHERE paymnet_id=$paymnet_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $paymnet_id = $row["paymnet_id"];
        $user_id = $row["user_id"];
        $amount = $row["amount"];
        $payment_date = $row["payment_date"];
        $status = $row["status"];
    } else {
        header("payment_date: /taskrabbit-like platform/payment_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["paymnet_id"]) || empty($_POST["user_id"]) || empty($_POST["amount"]) || empty($_POST["payment_date"]) || empty($_POST["status"])) {
        echo "All fields are required!";
    } else {
        $paymnet_id = $_POST["paymnet_id"];
        $user_id = $_POST["user_id"];
        $amount = $_POST["amount"];
        $payment_date = $_POST["payment_date"];
        $status = $_POST["status"];
        
        $sql = "UPDATE payments SET user_id='$user_id', amount='$amount', payment_date='$payment_date', status='$status' WHERE paymnet_id='$paymnet_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("payment_date: /taskrabbit-like platform/payment_table.php");
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
        <h3 style="color:green;">UPDATE PAYMENTS HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="paymnet_id" readonly class="input" value="<?php echo $paymnet_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" class="input" value="<?php echo $user_id; ?>"><br>
                <label>Amount</label><br>
                <input type="text" name="amount" class="input" value="<?php echo $amount; ?>"><br> 
                <label>Payment Date</label><br>
                <input type="text" name="payment_date" readonly value="<?php echo $payment_date; ?>" class="input"><br> 
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
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
