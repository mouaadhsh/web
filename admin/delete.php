<?php


$errorMessage = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "website";
    $connection = new mysqli($servername, $username, $password, $database);
    $errorMessage = "rani hna dharwak";
    if ($connection->connect_error) {
        die("connection failed: " . $connection->connect_error);
    }
    $sql = "DELETE FROM `user` WHERE id = $id;";

    if ($connection->query($sql) === TRUE) {
        // Query executed successfully
        header("location: /CROUD/index.php");
        exit;
    } else {
        // Query failed
        $errorMessage = "Error deleting record: " . $connection->error;
    }
} else {
    $errorMessage = "YAW...... manich ndkhol ll la partie ali rak masst7a9ha hhhhh ^o^ ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    if (!empty($errorMessage)) {
        echo "
            <div class= 'alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></buttn>
            </div>
                ";
    }
    ?>
</body>

</html>