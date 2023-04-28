<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <!-- <link rel="stylesheet" href="simple-v1.min.css"> -->
    <title>Document</title>
    <style>
        body{
            background-color: #202b38;
            color: aliceblue;
        }
        .table{
            color: aliceblue;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2>List of users</h2>
        <a href="/croud/create.php" class="btn btn-primary" role="button">New User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "website";

                $connection = new mysqli($servername, $username, $password, $database);
                
                if ($connection->connect_error) {
                    die("connection failed: " . $connection->connect_error);
                }
                $sql = "SELECT * FROM User";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "                
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[username]</td>
                        <td>$row[email]</td>
                        <td>$row[role]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary btn-sm'  href='/croud/edit.php?id=$row[id]'> Edit </a>
                            <a  class='btn btn-danger btn-sm'  href='/croud/delete.php?id=$row[id]'> Delete </a>
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