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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">TABLE OF ALL SERVICE REQUESTED </h4>
        <a href="bookings.php" class="btn btn-primary" style="margin-left: 15px;">Make New Booking</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>Id</th>
                    <th>Task Id</th>
                    <th>Serviceprovider Id</th>
                    <th>Booking Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM bookings";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['booking_id']}</td>
                        <td>{$row['task_id']}</td> 
                        <td>{$row['serviceprovider_id']}</td>
                        <td>{$row['booking_date']}</td>
                        <td>
                            <a href='/taskrabbit-like platform/bookings_edit.php?booking_id={$row['booking_id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='/taskrabbit-like platform/bookings_delete.php?booking_id={$row['booking_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
