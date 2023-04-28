<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "website";
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("connection failed: " . $connection->connect_error);
}

$username = "";
$email = "";
$password = "";

$errorMessage = "";
$seccessMassage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    do {
        if (empty($username) || empty($email) || empty($password)) {
            $errorMessage = "All the fields are required";
            break;
        }
        //insert a new client to the database
        $sql = "INSERT INTO `user`(`username`, `email`,`password`) VALUES ('$username','$email','  $password');";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $username = "";
        $email = "";
        $password = "";
        $seccessMassage = "User added correctly";


        header("location: /CROUD/index.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New User</h2>
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
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                </div>
            </div>
            <?php
            if (!empty($seccessMassage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$seccessMassage</strong>
                            <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></buttn>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/CROUD/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>