<?php
	require("../../connection/connection.php");
	$table = "";
	$arr = ['user_details', 'electricity_prices', 'news', 'pay_bills', 'support'];
	$sno = 0;

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		
		$table = $_GET['table'];
		$index = $_GET['index'];
		$sno = $_GET['sno'] + 1;

		for($i = 0; $i < $index; $i++){
			$res = mysqli_query($conn, "SELECT * FROM `$arr[$i]`");
			$sno = $sno - mysqli_num_rows($res);
		}

		$sql = "SELECT * FROM `$table` WHERE `sno` = '$sno'";
		$result = mysqli_query($conn, $sql);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				$num = mysqli_num_fields($result);
			for($i = 0; $i < $num; $i++){
				echo '<div>
				'.array_keys($row)[$i].'
				<input type="text" placeholder='.array_keys($row)[$i].' value='.$row[array_keys($row)[$i]].'></div>';
			}
			
		}
			
	}
			
}
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// $table = $_GET['table'];
		// $index = $_GET['index'];
		// $sno = $_GET['sno'] + 1;
			// print_r($_POST);

		// for($i = 0; $i < $index; $i++){
		// 	$res = mysqli_query($conn, "SELECT * FROM `$arr[$i]`");
		// 	$sno = $sno - mysqli_num_rows($res);
		// }
		// $sql = "DELETE FROM `$table` WHERE `sno` = '$sno'";
		// $result = mysqli_query($conn, $sql);
		
// }
	



?>