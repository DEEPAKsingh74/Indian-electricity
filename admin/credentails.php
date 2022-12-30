<?php
	session_start();
	require("../connection/connection.php");
	$table = "";
	if(!$_SESSION['admin']){
		header('location: http://localhost/html_project/index.php');

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.lordicon.com/qjzruarw.js"></script>
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
			overflow-x: hidden;

		   
		}
		.container{
			width: 100%;
			height: 100%;
			display: flex;
		   align-items: center;
		   flex-direction: column;
		}
		.content{
			width: 80%;
			height: 65%;
			overflow: hidden;
			
		}
		.admin_manage{
			width: 100%;
			height: 65%;
			position: absolute;
			overflow: hidden;
			
		}
		
		
		.navigate{
			width: 98%;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding-left: 10px;
			padding-right: 10px;
			color: white;
		}
		.buttons{
			width: 80%;
			height: 5%;
			display: flex;
			align-items: center;
			gap: 16px;
		}
		
		
		.buttons button{
			height: 100%;
			padding-left: 5px;
			padding-right: 5px;
			border: none;
			outline: none;
			border-radius: 4px;
			font-weight: bolder;
			background-color: rgb(202, 199, 199);
		}
		.admin_manage table{
			width: 100%;
			
			
			
		}
		
		table tr th{
			background-color: rgb(138, 138, 237);
			padding: 5px;
			height: 10px;
		}
		table tr td{
			padding-left: 10px;
			height: 1.28rem;
		}
		table tr td button{
			width: 100%;
			height: 100%;
			border: none;
			outline: none;
		}
		.next{
			transform: rotateZ(90deg);
			background-color: inherit;
			border: none;
			outline: none;
		}
		.previous{
			transform: rotateZ(-90deg);
			background-color: inherit;
			border: none;
			outline: none;

		}
		#edit{
			width: 40%;
			height: auto;
			box-shadow: 1px 1px 7px 1px gray;
			z-index: 5;
			top: 20%;
			left: 27%;
			border: none;
			border-radius: 5px;
			background-color: gray;
			padding: 5px;
		}
		.head{
			height: 25px;
			background-color: white;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		#close{
			cursor: pointer;
		}
		#edit form{
			width: 100%;
			height: 85%;
			background-color: green;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
		#edit_form div{
			width: 100%;
			margin-top: 10px;
			font-weight: bolder;
			
		}
		#edit_form input{
			width: 60%;
			height: 29px;
			padding: 5px;
			border: none;
			outline: none;
			margin-left: 10px;
			border-radius: 3px;

		}
		#edit_form button{
			width: 40%;
			height: 29px;
			border: none;
			outline: none;
			border-radius: 4px;
		}
	
	</style>
	<title>Admin page</title>
</head>
<body>
<dialog id="edit">
		<div class="head">
			<h4>EDIT</h4>
			<span id="close">X</span>
		</div>
		<br>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="edit_form">
			
		<br>
		<button type="submit" name="updateForm" id="form_sub">Update</button>
		<br>
		</form>
	</dialog>
	<div class="container">
		<h2>...ADMIN PAGE...
			<hr><hr>
		</h2>
	<br>
	<div class="buttons">
		<button class="navi_btn first_btn">CREDENTIALS</button>
		<button class="navi_btn">SUPPORT</button>
		<button class="navi_btn">ELECTRICITY-PRICE</button>
		<button class="navi_btn">NEWS</button>
		<button class="navi_btn">PAYMENT</button>
		<button class="navi_btn">FILE UPLOAD</button>
	</div><br>

	



	<div class="content">
		<div class="cred admin_manage">
			<table>
				<tr>
					<th>s.no.</th>
					<th>Username</th>
					<th>E-mail</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Delete</th>
					
				</tr>
				<?php
					$sql = "SELECT * FROM `user_details`";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
						<td>'.$row["sno"].'</td>
						<td>'.$row["username"].'</td>
						<td>'.$row["email"].'</td>
						<td>'.$row["date"].'</td>
						<td><button class="edit_btn"><lord-icon
							src="https://cdn.lordicon.com/hkkhwztk.json"
							trigger="hover"
							style="width:30px;height:100%">
						</lord-icon></button></td>
						<td><button class="del_btn"><lord-icon
							src="https://cdn.lordicon.com/jmkrnisz.json"
							trigger="hover"
							style="width:30px;height:100%">
						</lord-icon></button></td>
					</tr>';
					}
				?>
			</table>
		</div>
		
		<div class="e_prices admin_manage">
			<table>
				<tr>
					<th>S. no.</th>
					<th>Rural</th>
					<th>Urban</th>
					<th>Month</th>
					<th>Year</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `electricity_prices`";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
						<td>'.$row["sno"].'</td>
						<td>'.$row["rural"].'</td>
						<td>'.$row["urban"].'</td>
						<td>'.$row["month"].'</td>
						<td>'.$row["year"].'</td>
						<td><button class="edit_btn"><lord-icon
							src="https://cdn.lordicon.com/hkkhwztk.json"
							trigger="hover"
							style="width:30px;height:100%">
						</lord-icon></button></td>
						<td><button class="del_btn"><lord-icon
							src="https://cdn.lordicon.com/jmkrnisz.json"
							trigger="hover"
							style="width:30px;height:100%">
						</lord-icon></button></td>
					</tr>';
					}

				?>
				
			</table>
		</div>
		<div class="news admin_manage">
			<table>
				<tr>
					<th>S.no.</th>
					<th>Heading</th>
					<th>NEWS</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
					<?php
						$sql = "SELECT * FROM `news`";
						$result = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_assoc($result)){
							echo '<tr>
							<td>'.$row["sno"].'</td>
							<td>'.$row["heading"].'</td>
							<td>'.$row["body"].'</td>
							<td>'.$row["date"].'</td>
							<td><button class="edit_btn"><lord-icon
								src="https://cdn.lordicon.com/hkkhwztk.json"
								trigger="hover"
								style="width:30px;height:20px">
							</lord-icon></button></td>
							<td><button class="del_btn"><lord-icon
								src="https://cdn.lordicon.com/jmkrnisz.json"
								trigger="hover"
								style="width:30px;height:20px">
							</lord-icon></button></td>
						</tr>';
						}

?>

				
			</table>
		</div>
		<div class="payment admin_manage">
			<table>
				<tr>
					<th>S.no.</th>
					<th>PayedBy</th>
					<th>PayedTo</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Reference ID</th>
					<th>Time</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `pay_bills`";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
						<td>'.$row["sno"].'</td>
						<td>'.$row["username"].'</td>
						<td>'.$row["payed_to"].'</td>
						<td>'.$row["amount"].'</td>
						<td>Success</td>
						<td>'.$row["transaction_id"].'</td>
						<td>'.$row["time"].'</td>
						<td>'.$row["date"].'</td>
						<td><button class="edit_btn"><lord-icon
							src="https://cdn.lordicon.com/hkkhwztk.json"
							trigger="hover"
							style="width:30px;height:20px">
						</lord-icon></button></td>
						<td><button class="del_btn"><lord-icon
							src="https://cdn.lordicon.com/jmkrnisz.json"
							trigger="hover"
							style="width:30px;height:20px">
						</lord-icon></button></td>
						
					</tr>';
					}


				?>
				
			</table>
		</div>
		<div class="support admin_manage">
			<table>
				<tr>
					<th>S.no.</th>
					<th>Username</th>
					<th>Query</th>
					<th>Status</th>
					<th>Date</th>
					<th>Contact</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `support`";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
						<td>'.$row["sno"].' </td>
						<td>'.$row["username"].'</td>
						<td>'.$row["other_issue"].'</td>
						<td>Done</td>
						<td>'.$row["date"].'</td>
						<td>'.$row["contact"].'</td>
						<td><button class="edit_btn"><lord-icon
							src="https://cdn.lordicon.com/hkkhwztk.json"
							trigger="hover"
							style="width:30px;height:20px">
						</lord-icon></button></td>
						<td><button class="del_btn"><lord-icon
							src="https://cdn.lordicon.com/jmkrnisz.json"
							trigger="hover"
							style="width:30px;height:20px">
						</lord-icon></button></td>
					</tr>';
					}

				?>
				
			</table>
		</div>

		<div class="file_upload admin_manage">
			<form action="" method="post">
				<input type="text" placeholder="Username">
				<input type="file">
				<select name="" id="">
					<option value="">one</option>
					<option value="">two</option>
					<option value="">three</option>
				</select>
			</form>
		</div>
		
	</div>
	<br>
	<div class="navigate">
	</div>
</div>
<script>
	
	let admin_manage = document.querySelectorAll('.admin_manage');
	let edit = document.getElementById('edit');
	let form_sub = document.getElementById('form_sub');
	let edit_form = document.getElementById('edit_form');
	let close = document.getElementById('close');
	let edit_btn = document.querySelectorAll('.edit_btn');
	let del_btn = document.querySelectorAll('.del_btn');
	let navi_btns = document.querySelectorAll('.navi_btn');
	let navigate = document.querySelector('.navigate');

	var navigation_btn = 0;
	var sno = 0;
	var index_num = 0;
	admin_manage.forEach((e, index)=>{
		e.style.left = `${index*100}%`;
	})
	
	const navigator = (index)=>{
		admin_manage.forEach((e, i)=>{
			e.style.transform = `translateX(-${index*100}%)`;
			
		})
	}
	navi_btns.forEach((e, index)=>{	
		e.addEventListener('click', ()=>{
			navigation_btn = index;
			if(index == 1){
			navigate.style.display = 'none';
		}else{
			navigate.style.display = 'flex';

		}
			e.style.backgroundColor = 'rgb(138, 138, 237)';
			navigator(index)
		})
		e.addEventListener('blur', ()=>{
			e.style.backgroundColor = 'rgb(202, 199, 199)';
		})
	})

	const mapArray = (num)=>{
		let array = ['user_details', 'electricity_prices', 'news', 'pay_bills', 'support'];
		return array[num];
	}

	const getApi = (num, sno, index)=>{
		edit_form.innerHTML = '<br><button type="submit" id="form_sub">Update</button><br>';
		let xhr = new XMLHttpRequest();
		xhr.open("GET", `makeRequest/getedit.php?table=${num}&sno=${sno}&index=${index}`);
		xhr.send();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4){
				edit_form.insertAdjacentHTML('afterbegin', xhr.responseText);
				
			}
		}
	}

	const deleteApi = (num, sno, index)=>{
		const xhr = new XMLHttpRequest();
		xhr.open("POST", `makeRequest/deleteData.php`);
		const deleteUser = {
			"table":num,
			"sno":sno,
			"index":index
		}
		xhr.setRequestHeader("Content-type", "application/json");
		xhr.send(JSON.stringify(deleteUser));
		xhr.onreadystatechange = function(){
			navigate.innerHTML = xhr.responseText;
		}
	}

	edit_btn.forEach((e, index_num)=>{
		e.addEventListener('click', ()=>{
			var flag = 1;
			getApi(mapArray(navigation_btn),index_num, navigation_btn);
			if(flag){
				edit.show();
				flag = 0;
			}else{
				edit.close();
				flag = 1;
			}
		})
	})

	del_btn.forEach((e, index_num)=>{
		e.addEventListener('click', ()=>{
			deleteApi(mapArray(navigation_btn),index_num, navigation_btn);			
		})
	})

	close.addEventListener('click', ()=>{
		edit.close();
	})



	
</script>
</body>
</html>