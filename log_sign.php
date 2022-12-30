<?php
	require("connection/connection.php");
	session_start();
	$_SESSION['authentic'] = false;
	if(isset($_POST['login'])){

		function strip_password($password){
			$password = trim($password);
			$password = strip_tags($password);
			$password = stripslashes($password);
			$password = htmlspecialchars($password, ENT_HTML5);
			$password = htmlspecialchars($password, ENT_QUOTES);
		}

		$username = $_POST["username"];
		$password = $_POST['password'];
		$sql = "SELECT * FROM `user_details` WHERE `username` = '$username'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) == 1){
			if($username == "admin" && $password == password_verify($password, $row['password'])){
				$_SESSION['authentic'] = true;
				$_SESSION['admin'] = true;
				$_SESSION['username'] = $username;
				header('location: admin/credentails.php');
			}else if($password == password_verify($password, $row['password'])){
				$_SESSION['authentic'] = true;
				$_SESSION['admin'] = false;
				$_SESSION['username'] = $username;
				header('location: index.php');
			}
		}else{
			echo "Invalid credentials...";
		}

	}

	if(isset($_POST['signin'])){
		function strip_password($password){
			$password = trim($password);
			$password = strip_tags($password);
			$password = stripslashes($password);
			$password = htmlspecialchars($password, ENT_HTML5);
			$password = htmlspecialchars($password, ENT_QUOTES);
			return $password;
		}
		$username = $_POST["username"];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$hashed_password = password_hash(strip_password($password), PASSWORD_BCRYPT);
		$sql = "SELECT * FROM `user_details` WHERE `username` = '$username'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			echo " user already exists";
		}else if(mysqli_num_rows($result) == 0){
				$date = date("Y/m/d");
				$time = date("h-i-s");
				$sql2 = "INSERT INTO `user_details` (`username`, `password`,`email`,`date`, `time`) VALUES ('$username', '$hashed_password','$email', '$date', '$time');";
				mysqli_query($conn, $sql2) or die("Some error occured...");

				$_SESSION['authentic'] = true;
				$_SESSION['username'] = $username;
				header('location: index.php');
		}
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		html,
		body {
			width: 100%;
			height: 100%;
			font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
			overflow-x: hidden;
		}

		.container {
			width: 100%;
			height: 100%;
			background-image: url('images/bg_img.jpg');
			background-size: 100% 100%;
			background-position: center;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;


		}

		.login,
		.signin {
			width: 50%;
			height: 50%;
			backdrop-filter: blur(20px);
			backdrop-filter: brightness(80%);
			position: absolute;
			border-radius: 8px;
			box-shadow: 0.5px 0.5px 3px 1px white;
			transition: 1s;



		}

		.login form,
		.signin form {
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			gap: 1rem;
			position: absolute;

		}

		.login form input,
		.signin form input {
			width: 60%;
			height: 12%;
			border: none;
			outline: none;
			border-radius: 4px;
			padding-left: 10px;
			font-weight: bolder;
			color: coral;
		}

		.login form button,
		.signin form button {
			width: 20%;
			height: 10%;
			font-weight: bolder;
			background-color: inherit;
			border: 0.4px solid rgb(248, 246, 246);
			outline: none;
			color: white;
			transition: 1s;
			border-radius: 3px;
		}

		.submit_btn:hover,
		.submit_btn:hover {
			background-color: rgb(9, 9, 9);
			color: rgb(254, 234, 234);
			border-top: 1px solid red;
			border-bottom: 1px solid red;
			border-top-left-radius: 30px;
			border-bottom-right-radius: 30px;
		}

		.buttons {
			display: flex;
			position: absolute;
			align-items: center;
			top: 15%;
			left: 25%;
			height: 8%;
			width: 20%;
			gap: 10px;
			border-top-left-radius: 30px;
			border-bottom-right-radius: 30px;
			backdrop-filter: blur(20px);
			backdrop-filter: brightness(80%);
			box-shadow: 0.5px 0.5px 4px 1px white;
		}

		.buttons button {
			border: none;
			outline: none;
			height: 70%;
			width: 100%;
			border-top-left-radius: 30px;
			border-bottom-right-radius: 30px;
			color: white;
			transition: 0.5s;


		}

		#log {
			background-color: inherit;
		}

		#sign {
			background-color: black;
		}
	</style>
	<title>LOG IN / SIGN IN</title>
</head>

<body>

	<div class="container">

		<div class="login switch_cred">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<h2>LOG IN</h2>
				<input type="text" placeholder="Username" maxlength="24" title="Username" name="username" required>
				<input type="password" placeholder="Password" title="Password" name="password" required>
				<button type="submit" class="submit_btn" name="login">SUBMIT</button>
			</form>
		</div>
		<div class="buttons">
			<button onclick="login(this)" id="log">LOG IN</button>
			<button onclick="signin(this)" id="sign">SIGN IN</button>
		</div>

		<div class="signin switch_cred">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<h2>SIGN IN</h2>
				<input type="text" placeholder="Username" maxlength="24" title="Username" name="username">
				<input type="password" placeholder="Password" title="Password must be strong" name="password">
				<input type="email" placeholder="E mail" title="Email" name="email">
				<button type="submit" class="submit_btn" name="signin">SUBMIT</button>
			</form>
		</div>
	</div>

	<script>
		let count = 0;
		let switch_cred = document.querySelectorAll('.switch_cred');
		let log = document.getElementById('log');
		let sign = document.getElementById('sign');
		switch_cred.forEach((e, index) => {
			e.style.left = `${index * 100 + 25}%`;
		})
		const login = (e) => {
			e.style.backgroundColor = "inherit";
			if (count > 0) {
				count--;
				switch_funnc();
			} else {
				count = 0;
				switch_funnc();
			}
			sign.style.backgroundColor = "black";
		}
		const signin = (e) => {
			e.style.backgroundColor = "inherit";
			if (count < 1) {
				count++;
				switch_funnc();
			} else {
				count = 1;
				switch_funnc();
			}
			log.style.backgroundColor = "black";

		}
		const switch_funnc = () => {
			switch_cred.forEach((e) => {
				e.style.transform = `translateX(-${count * 200}%)`;
			})
		}

	</script>
</body>

</html>