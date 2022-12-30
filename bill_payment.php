<?php
require('connection/connection.php');
session_start();
if (isset($_POST['pay_bill'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$card_number = $_POST['card_number'];
	$cve = $_POST['cve'];
	$amount = $_POST['amount'];
	$payed_to = $_POST['payed_to'];
	$pay_id = 'ds8345';
	$transaction_id = '76455jjdf';

	function strip_password($password)
	{
		$password = trim($password);
		$password = strip_tags($password);
		$password = stripslashes($password);
		$password = htmlspecialchars($password, ENT_HTML5);
		$password = htmlspecialchars($password, ENT_QUOTES);
	}

	$hashed_password = password_hash(strip_password($password), PASSWORD_BCRYPT);
	$sql = "SELECT * FROM `user_details` WHERE `username` = '$username'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) == 1) {
		if ($password == password_verify($password, $row['password'])) {
			$date = date("Y/m/d");
			$time = date("h-i-s");
			$sql2 = "INSERT INTO `pay_bills` (`sno`,`username`, `password`,`card_number`,`cve`,`amount`, `pay_id`,`transaction_id`,`payed_to`
		 ,`date`, `time`) VALUES ('1','$username', '$hashed_password','$card_number','$cve','$amount','$pay_id','$transaction_id','$payed_to', '$date', '$time');";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				echo "payed";
			} else {
				echo "failed";
			}
		} else {
			echo "Invalid pass";
		}
	} else {
		echo "Invalid credentials...";
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
			font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
			display: flex;
			align-items: center;
			justify-content: center;
			background-image: url('images/payment_bg.jpg');
			background-position: center;
			background-size: 100% 100%;
		}

		.container {
			width: 50%;
			height: 90%;
			background-color: rgba(249, 252, 252, 0.3);
			box-shadow: 0px 10px 20px 1px black;
			border-radius: 10px;

		}

		.heading {
			width: 80%;
			background-color: rgba(41, 39, 39, 0.5);
			color: white;
			padding-top: 8px;
			padding-bottom: 8px;
			font-weight: bolder;
			padding-left: 20px;
			margin: 0px auto;
			border-radius: 5px;


		}

		.form_field {
			width: 100%;
			height: 100%;
		}

		.form_field form {
			width: 100%;
			height: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			gap: 10px;

		}

		.form_field form input {
			width: 60%;
			height: 8%;
			background-color: inherit;
			border: none;
			box-shadow: 0.2px 0.2px 1px 0.5px black;
			border-radius: 4px;
			font-weight: bolder;
			color: rgb(89, 3, 159);
			outline: none;
			padding-left: 10px;
		}

		.form_field form input::placeholder {
			color: rgb(150, 246, 54);
		}

		.buttons {
			width: 60%;
			height: 10%;

		}

		.buttons button {
			width: 40%;
			height: 100%;
			background-color: inherit;
			border: none;
			box-shadow: 0.2px 1px 1px 1px white;
			outline: none;
			border-radius: 5px;
			font-weight: bolder;
			margin-left: 5px;
			transition: 1s;


		}

		.buttons button:hover {
			background-color: rgba(245, 239, 206, 0.3);
			box-shadow: 0.2px 1px 1px 1px rgb(26, 25, 25);
			color: white;

		}

		.buttons button {
			color: black;
		}
	</style>
	<title>Bill payment</title>
</head>

<body>
	<div class="container">
		<div class="heading">BILL PAYMENT</div>
		<div class="form_field">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" placeholder="Username" name="username">
				<input type="password" placeholder="Password" name="password">
				<input type="text" placeholder="Card number" name="card_number">
				<input type="number" placeholder="cve" name="cve">
				<input type="number" placeholder="Amount" name="amount">
				<input type="text" placeholder="Whom to pay" name="payed_to">
				<div class="buttons">
					<button type="button"><a href="index.php"> Cancel</a></button>
					<button type="submit" name="pay_bill">PAY-BILL</button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>