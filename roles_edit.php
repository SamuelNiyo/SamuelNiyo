<?php
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["role_id"])) {
        header("requirements: /taskrabbit-like platform/roles_edit.php");
        exit;
    }
    $role_id = $_GET["role_id"];
    $sql = "SELECT * FROM role WHERE role_id=$role_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role_id = $row["role_id"];
        $department = $row["department"];
        $description = $row["description"];
        $requirements = $row["requirements"];
        $duration = $row["duration"];
    } else {
        header("requirements: /taskrabbit-like platform/roles_edit.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["role_id"]) || empty($_POST["department"]) || empty($_POST["description"]) || empty($_POST["requirements"]) || empty($_POST["duration"])) {
        echo "All fields are required!";
    } else {
        $role_id = $_POST["role_id"];
        $department = $_POST["department"];
        $description = $_POST["description"];
        $requirements = $_POST["requirements"];
        $duration = $_POST["duration"];
        
        $sql = "UPDATE role SET department='$department', description='$description', requirements='$requirements', duration='$duration' WHERE role_id='$role_id'";
        
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("requirements: /taskrabbit-like platform/roles_tables.php");
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
                <input type="text" name="role_id" readonly class="input" value="<?php echo $role_id; ?>"><br>
                <label>Department</label><br>
                <input type="text" name="department" class="input" value="<?php echo $department; ?>"><br>
                <label>Description</label><br>
                <input type="text" name="description" class="input" value="<?php echo $description; ?>"><br> 
                <label>Requirements</label><br>
                <input type="text" name="requirements" readonly value="<?php echo $requirements; ?>" class="input"><br> 
                <label>Duration</label><br>
                <input type="text" name="duration" value="<?php echo $duration; ?>" class="input"><br>  
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p><h1>Designed by Samuel-Niyomurengezi &copy; YEAR TWO BIT GROUP A &reg; 2024</h1></p>
    </footer>
</body>
</html>
