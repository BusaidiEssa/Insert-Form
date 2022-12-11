<?php
// php insert table
$servername = "localhost";
$username = "root";
$port = "3306";
$password = "";
$dbname = "car rental";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$IDC=$_POST['IDC'];
$FNC=$_POST['FNC'];
$LNC=$_POST['LNC'];
$City=$_POST['City'];
$Phone=$_POST['Phone'];

$sql = "INSERT INTO customer(IDC,FNC,LNC,City,Phone)
VALUES ('$IDC','$FNC','$LNC','$City','$Phone')";

$result = $conn->query($sql);
$conn->close();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql= "SELECT * FROM customer";
$result = $conn->query($sql);
$conn->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Customer Contract List</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #ADD8E6;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #ADD8E6;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>All records</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>IDC</th>
				<th>FNC</th>
				<th>LNC</th>
				<th>City</th>
                <th>Phone</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['IDC'];?></td>
				<td><?php echo $rows['FNC'];?></td>
				<td><?php echo $rows['LNC'];?></td>
				<td><?php echo $rows['City'];?></td>
                <td><?php echo $rows['Phone'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
</body>

</html>
