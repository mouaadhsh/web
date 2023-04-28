<!DOCTYPE html>
<html>
<head>
	<title>Login and Signup</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Login and Signup</h1>
		<div class="login-box">
			<h2>Login</h2>
			<form action="login.php" method="post">
				<label>Email</label>
				<input type="email" name="email" required>
				<label>Password</label>
				<input type="password" name="password" required>
				<button type="submit">Login</button>
			</form>
		</div>
		<div class="signup-box">
			<h2>Signup</h2>
			<form action="signup.php" method="post">
				<label>Name</label>
				<input type="text" name="name" required>
				<label>Email</label>
				<input type="email" name="email" required>
				<label>Password</label>
				<input type="password" name="password" required>
				<button type="submit">Signup</button>
			</form>
		</div>
	</div>
</body>
</html>