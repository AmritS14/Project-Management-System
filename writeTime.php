<?php

include "includes/config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$orderRcvdDate = $_POST['Dt_of_order_recd'];
$startDate = $_POST['START_DATE'];
$compDays = $_POST['Expected_No_of_days_for_completion'];
$plannedDate = date('F j, y', strtotime($startDate.' + '.$compDays.' days'));
$difference = round((strtotime($plannedDate) - time()) / (60 * 60 * 24));

$sql = "SELECT * FROM projects WHERE SNO=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($id != '')
{

  $sql = "UPDATE projects SET `Dt of order recd`='$orderRcvdDate', `START DATE`='$startDate', `Expected No.of days for completion`='$compDays', `PLANNED DT COMPLETION`='$plannedDate', Difference=$difference WHERE SNO=$id";

  mysqli_query($conn, $sql);

  header("Location: project.php?id=$id");
  
}

// foreach ($_POST as $key => $value) {
//   echo "$key<br>";
// }

?>
