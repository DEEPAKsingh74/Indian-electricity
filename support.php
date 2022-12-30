<?php
	require("connection/connection.php");

	if(isset($_POST['submit_support'])){
		$username = $_POST['username'];
		$contact = $_POST['contact'];
		$issue = $_POST['issue'];
		$oissue = $_POST['other_issue'];
		$date = date("Y/m/d");
		

		$sql = "INSERT INTO `support` (`username`,`contact`, `issue`,`other_issue`, `date`) VALUES ('$username','$contact','$issue','$oissue', '$date');";
		$result = mysqli_query($conn, $sql) or die("connectionerror...");
		

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		*{
		   margin:0;
		   padding:0;
		   box-sizing:border-box;
		}
		
		html, body{
		   width:100%;
		   height:100%;
		   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
		   background-image: url('images/support_bg.jpg');
		   background-size: 100% 100%;
		   display: flex;
		   align-items: center;
		   justify-content: center;
		}
		.container{
			width: 60%;
			height: 70%;
			backdrop-filter: blur(20px) brightness(90%);
			display: flex;
			border-radius: 5px;

		}
		.left_img{
			width: 40%;
			height: 100%;
			
		}
		.left_img img{
			width: 100%;
			height: 100%;
		}
		.right_support{
			width: 60%;
			height: 100%;

		}
		.right_support h3{
			margin-left: 38%;
			color: white;
			font-weight: bolder;
			font-size: 20px;
		}
		.right_support form{
			width: 100%;
			height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: flex-start;
			gap: 8px;
		}
		.right_support form input, .right_support form select{
			width: 80%;
			height: 2.4rem;
			border: none;
			border-radius: 4px;
			outline: none;
			padding-left: 10px;
			background-color: inherit;
			box-shadow: 0.5px 0.8px 1px 0.3px white;
			font-weight: bolder;
			color: rgb(41, 234, 27);
		}
		.right_support form input::placeholder{
			color: coral;
		}
		
		#text_other{
			width: 80%;
			height: 20%;
			resize: none;
			border: none;
			outline: none;
			border-radius: 5px;
			background-color: inherit;
			box-shadow: 0.5px 0.8px 1px 1px white;
			color: rgb(41, 234, 27);
			padding-left: 10px;

		}
		.submit{
			width: 50%;
			height: 2rem;
			font-weight: bolder;
			border: none;
			outline: none;
			background-color: inherit;
			box-shadow: 0.5px 0.8px 1px 1px white;



		}
		.submit:hover{
			box-shadow: 0.5px 0.8px 1px 1px black;
			color: white;

		}

	</style>
	<title>Support</title>
</head>
<body>
	<div class="container">
		<div class="left_img">
			<img src="images/bg_home.jpg" alt="">
		</div>
		<div class="right_support">
			<h3>SUPPORT</h3><br><br>
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="text" placeholder="Username" name="username">
			<input type="tel" placeholder="Contact" name="contact">
			<select name="issue" id="support_options">
				<optgroup label="IT SUPPORT">
					<option value="1">Payment Issue</option>
					<option value="2">Money not Received</option>
					<option value="3">Money not Sent but Deducted</option>
					<option value="4">Amount not shown in history</option>
					<option value="5">Transaction Failed</option>
				</optgroup>
				<optgroup label="WEB SUPPORT">
					<option value="6">Home page not working</option>
					<option value="7">Payment page not working</option>
					<option value="8">History is not correctly shown</option>
					<option value="9">Electricity unit price not showing</option>
				</optgroup>
			</select>
			<input type="text" placeholder="other issue" name="other_issue">
			<button type="submit" class="submit" name="submit_support">SUBMIT</button>
			</form>
		</div>
	</div>
	
</body>
</html>