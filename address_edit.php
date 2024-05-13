<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["address_id"])) {
        header("location: /taskrabbit-like platform/address_edit.php");
        exit;
    }
    $address_id = $_GET["address_id"];
    $sql = "SELECT * FROM address WHERE address_id=$address_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $address_id = $row["address_id"];
        $district = $row["district"];
        $city = $row["city"];
        $location = $row["location"];
        $street = $row["street"];
    } else {
        header("location: /taskrabbit-like platform/address_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["address_id"]) || empty($_POST["district"]) || empty($_POST["city"]) || empty($_POST["location"]) || empty($_POST["street"])) {
        echo "All fields are required!";
    } else {
        $address_id = $_POST["address_id"];
        $district = $_POST["district"];
        $city = $_POST["city"];
        $location = $_POST["location"];
        $street = $_POST["street"];
        
        $sql = "UPDATE address SET district='$district', city='$city', location='$location', street='$street' WHERE address_id='$address_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /taskrabbit-like platform/address_table.php");
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
        <h3 style="color:green;">UPDATE USERS HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>ID</label><br>
                <input type="text" name="address_id" readonly class="input" value="<?php echo $address_id; ?>"><br>
                <label>District</label><br>
                <input type="text" name="district" class="input" value="<?php echo $district; ?>"><br>
                <label>City</label><br>
                <input type="text" name="city" class="input" value="<?php echo $city; ?>"><br> 
                <label>Location</label><br>
                <input type="text" name="location" readonly value="<?php echo $location; ?>" class="input"><br> 
                <label>Street</label><br>
                <input type="text" name="street" value="<?php echo $street; ?>" class="input"><br>  
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
