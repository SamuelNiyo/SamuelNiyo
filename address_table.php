<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task rabit-like platform</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">TASK RABBIT-LIKE PLATFORM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">TABLE OF ALL USERS </h4>
        <a href="address.php" class="btn btn-primary" style="margin-left: 15px;">New User</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>Addres Id</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Street</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM address";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['address_id']}</td>
                        <td>{$row['district']}</td> 
                        <td>{$row['city']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['street']}</td>
                        <td>
                            <a href='/taskrabbit-like platform/address_edit.php?address_id={$row['address_id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='/taskrabbit-like platform/address_delete.php?address_id={$row['address_id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
