<!DOCTYPE html>
<!DOCTYPE html>
<html>
<body>
	<form method="post" action="table.php">
		<table border="1">
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>user_name</th>
				<th>valet_name</th>
				<th>license_plate</th>
				<th>enter_time</th>
				<th>exit_time</th>
				<th>total</th>
			</tr>
			<?php
			print_r('Search all the license plates which contains the string:'.$_POST['name']);
			print_r('<HR>');
			$mysqli = new mysqli('127.0.0.1','root','123456','parking_lot_schema');
			if ($mysqli->connect_error){
				die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
			}
			$result = $mysqli->query("select * from records_all_name where license_plate like '%".$_POST['name']."%'");
			while($row=$result->fetch_row()){
				echo'<tr>'.
				'<td>'.$row[0].'</td>'.
				//'<td>'.$row[1].'</td>'.
				'<td><input type="submit" name="name" value='.$row[1].'></td>'.
				'<td>'.$row[2].'</td>'.
				'<td>'.$row[3].'</td>'.
				'<td>'.$row[4].'</td>'.
				'<td>'.$row[5].'</td>'.
				'<td>'.$row[6].'</td>'.
				'<td>'.$row[7].'</td>'.
				'</tr>';
			}
			$mysqli->close();
			?>
		</table>
	</form>
	<HR>
	<form method="post" action="start.php">
		<button type="submit">Return to start</button>
	</form>
</body>
</html>
