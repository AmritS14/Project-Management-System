<html>
<head>
	<title>BOM</title>
</head>
<body>

<?php
include "includes/config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM bom_list";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

if ($numRows > 0)
{?>
<style>
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<table>
  <tr>
    <th>Item ID</th>
    <th>Name</th>
    <th>Spec</th>
    <th>Quantity</th>
    <th>Dispatched</th>
    <th>Date</th>
    <th>Taken by</th>
    <th>Mode</th>
    <th>Recieved by</th>
  </tr>
	<?phpfor ($i = 0; $i < $numRows; $i++)
	{
		$row = mysqli_fetch_assoc($result);
		$itemId = $row['itemId'];
		$resultInner = mysqli_query($conn, "SELECT itemName FROM bom_items WHERE itemId='$itemId'");
		$rowInner = mysqli_fetch_assoc($resultInner);
		$name = $rowInner['itemName'];
		$spec = $row['itemSpec'];
		$qty = $row['itemQty'];
		$disp = $row['itemDispatch'];
		$date = $row['date'];
		$takenBy = $row['takenBy'];
		$mode = $row['mode'];
		$recievedBy = $row['recievedBy'];
		?>
		<tr>
			<td><?php echo$itemId?></td>
			<td><?php echo$name?></td>
			<td><?php echo$spec?></td>
			<td><?php echo$qty?></td>
			<td><?php echo$disp?></td>
			<td><?php echo$date?></td>
			<td><?php echo$takenBy?></td>
			<td><?php echo$mode?></td>
			<td><?php echo$recievedBy?></td>
		</tr>

<?php	}?></table>
<?php}
else
	echo "No data found";
?>
</body>
</html>