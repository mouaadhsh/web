<?php
session_start();
require_once 'config.php';

if (isset($_POST['username'], $_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $con->prepare('SELECT id, password, role FROM user WHERE username = ?');
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$stmt->store_result();
    
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $hashed_password, $role);
		$stmt->fetch();
        echo("username = $username  |" . "  hashed_password = $hashed_password  |  password = $password  |" . " id = $id  ||" );
            if (trim($password) == trim($hashed_password)) {
			$_SESSION['user_id'] = $id;
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
            echo ("correct");
			exit;
			} else {
			echo '/n Incorrect username and/or password! First';
		}
	} else {
		echo 'Incorrect username and/or password! Second';
	}

	$stmt->close();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>
