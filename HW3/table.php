<!DOCTYPE html>
<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="start.php">
		<table border="1">
			<tr>
				<th>user_name</th>
				<th>valet_name</th>
				<th>parking_name</th>
				<th>license_plate</th>
				<th>enter_time</th>
				<th>exit_time</th>
				<th>total</th>
			</tr>
			<?php
			print_r($_POST['name']);
			$user_id_search = $_POST['name'];
			$mysqli = new mysqli('127.0.0.1','root','123456','parking_lot_schema');
			if ($mysqli->connect_error){
				die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
			}
			$result = $mysqli->query("select user_name, valet_name, parking_name, license_plate, enter_time, exit_time, total from records_all_name where user_id ='{$user_id_search}'");
			while($row=$result->fetch_row()){
				echo'<tr>'.
				'<td>'.$row[0].'</td>'.
				'<td>'.$row[1].'</td>'.
				'<td>'.$row[2].'</td>'.
				'<td>'.$row[3].'</td>'.
				'<td>'.$row[4].'</td>'.
				'<td>'.$row[5].'</td>'.
				'<td>'.$row[6].'</td>'.
				'</tr>';
			}
			$mysqli->close();
			?>
			<HR>
			<button type="submit">Return to start</button>
		</form>
</body>
</html>