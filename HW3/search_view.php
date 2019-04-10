<!DOCTYPE html>
<!DOCTYPE html>
<html>
<body>
	<form method="get" action="start.php">
		<table border="1">
			<?php
			$mysqli = new mysqli('127.0.0.1','root','123456','parking_lot_schema');
			if ($mysqli->connect_error){
				die('Connect Error ('.$mysqli->connect_errno.')'.$mysqli->connect_error);
			}
			$result = $mysqli->query('show table status where comment="view" and name like "%'.$_POST['name'].'%"');
			while($row=$result->fetch_array(MYSQLI_ASSOC)){
				echo'<tr>'.
				'<td>'.$row['Name'].'</td>'
				.'</tr>';
			}
			$mysqli->close();
			?>
		</table>
			<br><br>
			<button type="submit">Return to start</button>
		</form>
</body>
</html>