<?php
	require("../../connection/connection.php");
	$arr = ['user_details', 'electricity_prices', 'news', 'pay_bills', 'support'];
	$request = file_get_contents("php://input"); // gets the raw data
	$params = json_decode($request,true); // true for return as array
	$table = $params['table'];
	$sno = $params['sno'] + 1;
	$index = $params['index'];	
	for($i = 0; $i < $index; $i++){
		$res = mysqli_query($conn, "SELECT * FROM `$arr[$i]`");
		$sno = $sno - mysqli_num_rows($res);
	}
	$sql = "DELETE FROM `$table` WHERE `sno` = '$sno'";
	$result = mysqli_query($conn, $sql);
?>