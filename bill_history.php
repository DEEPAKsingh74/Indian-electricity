<?php
	session_start();
	require('connection/connection.php');

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
		   background-image: url('images/bill_history.jpg');
		   background-position: center;
		   display: flex;
		   align-items: center;
		   justify-content: center;
		   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
		   
		}
		.container{
			width: 88%;
			height: 100%;
			backdrop-filter: blur(7px) brightness(100%);
			display: flex;
		   flex-direction: column;
		   align-items: center;
		   gap: 8px;
		}
		.heading{
			width: 70%;
			height: 2rem;
			background-color: rgba(126, 223, 191, 0.5);
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: 10px;
		}
		table{
			width: 90%;
		}
		.payment{
			height: 3.4rem;
			background-color: rgba(133, 239, 27, 0.9);
			color: white;
			font-weight: bolder;
		}
		.table_data td{
			padding-left: 10px;
			color: rgb(18, 18, 18);
		}
		

	</style>
	<title>HISTORY</title>
</head>
<body>
	<div class="container">
		<div class="heading"><h3>HISTORY</h3></div><br>
		<table>
			<tr>
			<th  class="payment">Payment method</th>
			<th  class="payment">Payment id</th>
			<th  class="payment">Transaction id</th>
			<th  class="payment">Receipt date</th>
			<th  class="payment">Amount paid</th>
			<th  class="payment">Paid to</th>
			<th  class="payment">time</th>
			</tr>
			<?php 
			if($_SESSION['authentic']){
				$username = $_SESSION['username'];

				$sql = "SELECT * FROM `pay_bills` WHERE `username`='$username'";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr class="table_data">
					<td>Credit card</td>
					<td>'.$row["pay_id"].'</td>
					<td>'.$row["transaction_id"].'</td>
					<td>'.$row["date"].'</td>
					<td>'.$row["amount"].'</td>
					<td>'.$row["payed_to"].'</td>
					<td>'.$row["time"].'</td>
				</tr>';
				}
			}else{
				echo "by";
			}
			?>
			
		</table>
	</div>
	
</body>
</html>