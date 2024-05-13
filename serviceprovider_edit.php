<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["serviceprovider_id"])) {
        header("location: /taskrabbit-like platform/serviceprovider_edit.php");
        exit;
    }
    $serviceprovider_id = $_GET["serviceprovider_id"];
    $sql = "SELECT * FROM service_providers WHERE serviceprovider_id=$serviceprovider_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $serviceprovider_id = $row["serviceprovider_id"];
        $user_id = $row["user_id"];
        $address_id = $row["address_id"];
        $role_id = $row["role_id"];
        $description = $row["description"];
        $hourly_rate = $row["hourly_rate"];
        $rating = $row["rating"];

    } else {
        header("location: /taskrabbit-like platform/serviceprovider_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["serviceprovider_id"]) || empty($_POST["user_id"]) || empty($_POST["address_id"]) || empty($_POST["role_id"]) || empty($_POST["description"]) || empty($_POST["hourly_rate"]) || empty($_POST["rating"])) {
        echo "All fields are required!";
    } else {
        $serviceprovider_id = $_POST["serviceprovider_id"];
        $user_id = $_POST["user_id"];
        $address_id = $_POST["address_id"];
        $role_id = $_POST["role_id"];
        $description = $_POST["description"];
        $hourly_rate = $_POST["hourly_rate"];
        $rating = $_POST["rating"];
        $sql = "UPDATE service_providers SET user_id='$user_id', address_id='$address_id', role_id='$role_id', description='$description', hourly_rate='$hourly_rate', rating='$rating' WHERE serviceprovider_id='$serviceprovider_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /taskrabbit-like platform/serviceprovider_table.php");
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
    <link rel="stylesheet" type="text/css" href="./css/stylee.css" role_id="style1" media="screen,tv,print,handheld"/>
    <role_id>Task Rabbit-Platform</role_id>
</head>
<body>
    <center>
        <h2>TASK RABBIT-LIKE PLATFORM</h2>
        <h3 style="color:green;">UPDATE SERVICE REQUESTED HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="serviceprovider_id" readonly class="input" value="<?php echo $serviceprovider_id; ?>"><br>
                <label>User Id</label><br>
                <input type="text" name="user_id" class="input" value="<?php echo $user_id; ?>"><br>
                <label>Address Id</label><br>
                <input type="text" name="address_id" class="input" value="<?php echo $address_id; ?>"><br> 
                <label>Role Id</label><br>
                <input type="text" name="role_id" readonly value="<?php echo $role_id; ?>" class="input"><br> 
                <label>Description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>" class="input"><br>  
                <label>Hourly rate</label><br>
                <input type="number" name="hourly_rate" value="<?php echo $hourly_rate; ?>" class="input"><br>
                <label>Rating</label><br>
                <input type="number" name="rating" value="<?php echo $rating; ?>" class="input"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
