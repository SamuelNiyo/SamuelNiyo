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
        <a href="message.php" class="btn btn-primary" style="margin-left: 15px;">New User</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered" style="margin-left:0px;">
            <thead bgcolor="pink">
                <tr>
                    <th>Message Id</th>
                    <th>Sender Id</th>
                    <th>Message Content</th>
                    <th>Receiver</th>
                    <th>Message Type</th>
                    <th>Message Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM message";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['message_id']}</td>
                        <td>{$row['sender_id']}</td> 
                        <td>{$row['receiver_id']}</td>
                        <td>{$row['message_content']}</td>
                        <td>{$row['message_type']}</td>
                        <td>{$row['message_date']}</td>
                        <td>
                            <a href='/taskrabbit-like platform/message_edit.php?message_id={$row['message_id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                            <a href='/taskrabbit-like platform/message_delete.php?message_id={$row['message_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
