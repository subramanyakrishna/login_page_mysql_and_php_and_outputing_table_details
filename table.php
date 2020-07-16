<!DOCTYPE html>
<html>
<head>
	<title>Table with DATA</title>
	<style type="text/css">
		td{
			width: 300px;
			height:50px;
			text-align: center;
			border: 2px solid black;
			padding: 0px;
			background-color: orange;
		}
		tr{
			width: 100px;
			height:50px;
			text-align: center;
			border: 2px solid black;
			padding: 0px;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Password</th>
			<th>Date and time of registration</th>

		</tr>
		<?php  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "login";
		$conn = mysqli_connect($servername, $username, $password ,$database);

		if (!$conn) {
		  echo "Connection error: " . mysqli_connect_error();
		  die();
			}
		$sql="SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
  
  			while($row = mysqli_fetch_assoc($result)) {
  					echo "<tr>  <td>" . $row["id"] . "</td>  <td>" . $row["email"] . "</td>  <td>". $row["psw"]. "</td>  <td>" .$row['created_at']."</td>  </tr>";

  			}
  			}else {
  			echo "0 results";
			}
			mysqli_close($conn);
			?>
	</table>
</body>
</html>