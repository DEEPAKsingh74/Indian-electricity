<?php
require('connection/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/6ea7bc7b86.js" crossorigin="anonymous"></script>
	<script src="https://cdn.lordicon.com/qjzruarw.js"></script>
	<style>
		* {margin: 0;padding: 0;box-sizing: border-box;}
		html,
		body {width: 100%;height: 100%;background-image: url('images/bg_home.jpg');background-size: 100% 100%;
background-repeat: no-repeat;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;scroll-behavior: smooth;}
		::-webkit-scrollbar {display: none;}
		.container {width: 100%;height: 100%;}
		.navbar {width: 100%;}
		.navbar ul {display: flex;align-items: center;justify-content: flex-end;list-style-type: none;gap: 20px;
margin-top: 1rem;margin-right: 1rem;}
		.navbar ul li {color: white;}
		.custom_text {width: 100%;height: 50%;margin-top: 7%;display: flex;align-items: center;justify-content: flex-end;flex-direction: column;}
		.custom_text #typing {width: 40%;height: 70%;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;text-transform: uppercase;color: white;font-weight: bolder;font-size: 20px;align-self: flex-end;}
		#typing::first-letter {font-size: 60px;}
.buttons {margin-top: 10px;align-self: flex-end;margin-right: 20%;}
		.buttons button {width: 7rem;height: 2rem;font-weight: bolder;border: none;border-radius: 3px;
box-shadow: 0.5px 0.5px 4px 1px rgb(250, 249, 249);outline: none;background-color: inherit;color: whitesmoke;
transition: 0.5s;}
		.buttons button:hover {
			border-top-left-radius: 30px;border-bottom-right-radius: 30px;background-color: rgb(152, 185, 186);}
		.ring_animation {width: 100%;display: flex;margin-top: 4%;align-items: center;justify-content: center;
gap: 20px;}
		.rotators {border-radius: 50%;width: 100px;height: 100px;background-color: bisque;transition: 0.5s;}
		.rotators img {width: 100%;height: 100%;border-radius: 50%;}
		.rotators:hover {transform: perspective(800px) rotateZ(360deg) translateX(15px);border: 2px solid red;}
		.marquee_news {width: 100%;height: 30%;background-color: aliceblue;display: flex;align-items: center;
justify-content: center;gap: 10px;margin-top: 25px;margin-bottom: 25px;}
		.marquee_news .news {width: 20%;height: 100%;
			background-color: rgb(233, 167, 154);
			border-radius: 5px;
			padding-left: 5px;
			padding-right: 5px;
		}

		.user_details {
			width: auto;
			padding-top: 6px;
			padding-bottom: 6px;
			display: flex;
			align-items: center;
			justify-content: space-around;
			background-color: rgb(223, 222, 219);
			margin-top: 30px;

		}

		.user_com {
			width: 20%;
			height: 100%;
			background-color: brown;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}

		.save_electricity,
		.danger,
		.preventions,
		.future_tech {
			width: 100%;
			height: 20rem;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 50px;
			padding: 5px;
			margin-top: 30px;
		}

		.save_electricity img,
		.danger img,
		.preventions img,
		.future_tech img {
			width: 20%;
			height: 90%;
		}

		.save_electricity p,
		.danger p,
		.preventions p,
		.future_tech p {
			padding: 10px;
			line-height: 27px;
		}

		.footer {
			width: 100%;
			height: 15rem;
			display: flex;
			align-items: center;
			justify-content: space-around;
			background-color: rgb(156, 175, 169);
			margin-top: 8%;
		}

		.social img {
			width: 100px;
			height: 60px;
			border-radius: 4px;
		}

		.footer>div {
			display: flex;
			flex-direction: column;
		}

		.social_icons a {
			font-size: 25px;
		}

		.footer a {
			color: black;
		}

		.footer>div a {
			margin-top: 5px;
			font-weight: bolder;
		}

		#dialog_prices {
			width: 50%;
			height: 70%;
			background-color: rgba(100, 98, 98, 0.8);
			border: none;
			box-shadow: 0.5px 0.5px 4px 1px rgb(247, 244, 244);
			margin-left: 20px;
			position: absolute;
			z-index: 5;
			color: rgb(243, 236, 241);
			transition: 1s;
			display: none;
			overflow: auto;
		}

		#dialog_prices h2 {
			color: rgb(11, 11, 11);
			font-family: fantasy;

		}

		#dialog_prices table {
			width: 100%;

		}

		#dialog_prices table td {
			border: 2px solid rgb(243, 238, 238);
		}

		#e-prices {
			cursor: pointer;
		}

		.news marquee {
			font-weight: bolder;
			color: white;
		}

		.news p {
			font-weight: bolder;
		}
	</style>
	<title>Home page</title>
</head>

<body>
	<div class="container">
		<nav class="navbar">
			<ul>
				<li id="e-prices">ELECTRICITY-PRICE</li>

				<a href="about.php">
					<li>ABOUT</li>
				</a>
				<a href="bill_payment.php">
					<li>PAY-BILLS</li>
				</a>
				<a href="support.php">
					<li>SUPPORT</li>
				</a>
				<a href="bill_history.php">
					<li>HISTORY</li>
				</a>
			</ul>
		</nav>
		<dialog id="dialog_prices">
			<h2>ELICTRICITY PRICE UNIT</h2><br>
			<table>
				<tr>
					<th>s no.</th>
					<th>Urban</th>
					<th>Rural</th>
					<th>Year</th>
					<th>Month</th>
				</tr>
				<?php
				$sql = "SELECT * FROM `electricity_prices`";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>
						<td>' . $row["sno"] . '</td>
						<td>' . $row["urban"] . '</td>
						<td>' . $row["rural"] . '</td>
						<td>' . $row["month"] . '</td>
						<td>' . $row["year"] . '</td>
					</tr>';
				}

				?>




			</table>
		</dialog>
		<div class="custom_text">
			<div id="typing">

			</div>
			<div class="buttons">
				<?php

				if ($_SESSION['authentic']) {
					echo '<a href="log_out.php"><button type="button">LOG OUT</button></a>';
				} else {
					echo '<a href="log_sign.php"><button type="button">LOG IN</button></a>
						<a href="log_sign.php"><button type="button">SIGN IN</button></a>';
				}

				?>

			</div>
		</div>
	</div>
	<div class="ring_animation">
		<div class="rotators"><img src="images/ring_img1.jpg" alt=""></div>
		<div class="rotators"><img src="images/ring_img2.jpg" alt=""></div>
		<div class="rotators"><img src="images/ring_img3.jpg" alt=""></div>
		<div class="rotators"><img src="images/ring_img4.jpg" alt=""></div>
		<div class="rotators"><img src="images/ring_img5.jpg" alt=""></div>
	</div>
	<div class="marquee_news">
		<?php
		$sql2 = "SELECT * FROM `news` LIMIT 5";
		$result2 = mysqli_query($conn, $sql2);
		while ($row2 = mysqli_fetch_assoc($result2)) {
			echo '<div class="news">
				<marquee behavior="" direction="">' . $row2["heading"] . '</marquee>
				<br><br>
				<p>' . $row2["body"] . '</p>
			</div>';
		}

		?>

	</div>

	<div class="user_details">
		<div id="user_number user_com">
			<lord-icon src="https://cdn.lordicon.com/hbvyhtse.json" trigger="hover" colors="primary:#121331" style="width:60px;height:60px">
			</lord-icon><br>
			<h2>67569+</h2>
			<h3>USERS</h3>
		</div>
		<div id="active_user_number user_com">
			<lord-icon src="https://cdn.lordicon.com/zscdqzcc.json" trigger="hover" style="width:60px;height:60px">
			</lord-icon><br>
			<h2>8365+</h2>
			<h3>ACTIVE USERS</h3>
		</div>
		<div id="uptime user_com">
			<lord-icon src="https://cdn.lordicon.com/xryjrepg.json" trigger="hover" style="width:60px;height:60px">
			</lord-icon><br>
			<h2>457863+</h2>
			<h3>UPTIME</h3>
		</div>
	</div>

	<div class="content">
		<div class="save_electricity">
			<img src="images/save_elec.jpg" alt="save_electricity image">
			<div class="para">
				<h2>SAVE ELECTRICITY</h2>
				<p>Switch off lights when not in use.Turn off lights, carefully with your washing , avoid the tumble drying. Spend less time in the shower, swap your bath for a shower. <br>Light bulb lights and fans switch off when not required. Replace bulbs with tube light and CFL. Utilize natural light by using electronic chokes and regulators. Optimise use of lights in malls, multiplexes and hotels. <br>Switch to energy saving LED lights. Understand and manage your home's energy use . Get the best energy deal. <br><br>
					<b>SAVE MONEY WITH SOLAR ENERGY.</b>
				</p>
			</div>
		</div>
		<div class="danger">
			<div class="para">
				<h2>DANGER</h2>
				<p>Working with electricity can be dangerous. Engineers, electricians, and other workers deal with electricity directly, including working on overhead lines, electrical installation and circuit assemblies.There are four main types of electrical injuries: flash, flame, lightning, and true. <br> Flash injuries, caused by an arc flash, are typically associated with superficial burns, as no electrical current travels past the skin. Flame injuries occur when an arc flash ignites an individual’s clothing, and electrical current may or may not pass the skin in these cases. Lightning injuries, involving extremely short but very high voltage electrical energy, are associated with an electrical current flowing through the individual’s entire body. True electrical injuries involve an individual becoming part of an electrical circuit. In these cases, an entrance and exit site are usually found.</p>
			</div>
			<img src="images/danger.jpg" alt="">
		</div>
		<div class="preventions">
			<img src="images/safety.jpg" alt="">
			<div class="para">
				<h2>PREVENTION</h2>
				<p>1.Overloading an electric outlet is a common cause of electrical problems <br><br>
					2. Damaged power cords area serious residential electrical safety risk and they aaare capable of causing both fires and electrocaution. <br><br>
					3. Electrical safety tips don't just apply to power cords when thery are in use cords also need to be stored safely to prevent damage. <br><br>
					4. one of the simplest electricity safety tips is also one of the easiest to forget when an apliance is not in use, unplug it. <br><br>
					5. Water and electricity don't mix well.</p>
			</div>
		</div>

		<div class="future_tech">
			<div class="para">
				<h2>FUTURE OF ELECTRICITY</h2>
				<p>Alternative ways of generating electricity are here . Learn more about the most amzing new ways of creating energy available today. <br><br>
					1. A large geostationary array would collect and focus light from the sun. <br>
					2. Photo voltaic cells would convert that light into electricity. <br>
					3. That electricity would be used to power a microwave laser aimed towards a ground on earth. <br>
					4. Microwave energy would be reeived by the antenna array and converted back into electricity.</p>
			</div>
			<img src="images/future_tech.jpg" alt="">
		</div>
	</div>
	<footer class="footer">
		<div class="social">
			<img src="images/logo.jpg" alt=""><br>
			<div class="social_icons">
				<a href=""><i class="fa-brands fa-square-facebook"></i></a>
				<a href=""><i class="fa-brands fa-square-instagram"></i></a>
				<a href=""><i class="fa-brands fa-square-twitter"></i></a>
				<a href=""><i class="fa-brands fa-linkedin"></i></a>
			</div>
		</div>
		<div class="about">
			<h2>ABOUT</h2><br>
			<a href="">About</a>
			<a href="">How it goes?</a>
			<a href="">About Transactions</a>
		</div>
		<div class="support">
			<h2>SUPPORT</h2><br>
			<a href="">Help</a>
			<a href="">Contact(call)</a>
			<a href="">E-mail</a>
		</div>
	</footer>

	<script>
		let typing = document.getElementById('typing');
		let e_prices = document.getElementById('e-prices');
		let dialog_prices = document.getElementById('dialog_prices');
		let user_number = document.getElementById('user_number');
		let active_user_number = document.getElementById('active_user_number');
		let string = "Not as legible or simple as slice or substring but does allow you to play with the string using some nice array methods, so worth knowing.";
		let count = 0;
		let str = "";
		const run_interval = setInterval(() => {
			str = str.concat(string[count]);
			typing.innerText = str;
			count++;
			if (count >= string.length) {

				clearInterval(run_interval);
			}
		}, 50)

		e_prices.addEventListener('click', () => {
			if (dialog_prices.style.display == 'block') {
				dialog_prices.style.display = 'none';
			} else {
				dialog_prices.style.display = 'block';
			}
		})
	</script>
</body>

</html>