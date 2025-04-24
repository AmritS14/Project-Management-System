<?php

include "includes/config.php";

$cName = isset($_POST['NAME_OF_CLIENT']) ? $_POST['NAME_OF_CLIENT'] : ''; 

if ($cName != '')
{

$sql = "SELECT * from projects WHERE `NAME OF CLIENT`='$cName'";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);
if ($numRows > 0) 
{
  echo "<script>alert('Project already exists'); window.location='newProject.php'</script>";
  die();
}
// $newCompanyName = isset($_POST['newCompanyName']) ? $_POST['newCompanyName'] : '';
// $newStatus = isset($_POST['newStatus']) ? $_POST['newStatus'] : '';
// $newOrderRcvdDate = isset($_POST['newOrderRcvdDate']) ? $_POST['newOrderRcvdDate'] : '';
// $newStartDate = isset($_POST['newStartDate']) ? $_POST['newStartDate'] : '';
// $newCompletionDays = isset($_POST['newCompletionDays']) ? $_POST['newCompletionDays'] : '';
// $newPlannedDate = isset($_POST['newPlannedDate']) ? $_POST['newPlannedDate'] : '';

  $sql = "INSERT INTO projects (`NAME OF CLIENT`) VALUES ('$cName');";

  // echo $sql;
  mysqli_query($conn, $sql);
  $sql = "SELECT * from projects WHERE `NAME OF CLIENT`='$cName'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  foreach($_POST as $key=>$value)
  {
     $key = str_replace('_', ' ', $key);
     $key = str_replace('No ', 'No.', $key);
     if (array_key_exists($key, $row))
     {
      $sql = "UPDATE projects SET `$key`='$value' WHERE `NAME OF CLIENT`='$cName'";
      mysqli_query($conn, $sql);
     }
  }

  $startDate = $_POST['START_DATE'];
  $compDays = $_POST['Expected_No_of_days_for_completion'];
  $plannedDate = date('F j, y', strtotime($startDate.' + '.$compDays.' days'));
  $diff = round((strtotime($plannedDate) - time()) / (60 * 60 * 24));
  $sql = "UPDATE projects SET `PLANNED DT COMPLETION`='$plannedDate', Difference=$diff WHERE `NAME OF CLIENT`='$cName'";
  $result = mysqli_query($conn, $sql);

  $sql = "SELECT SNO from projects WHERE `NAME OF CLIENT`='$cName'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row['SNO'];


  // $sql = "UPDATE projects SET `NAME OF CLIENT`='$newCompanyName', STATUS='$newStatus', `Dt of order recd`='$newOrderRcvdDate', `START DATE`='$newStartDate', `PLANNED DT COMPLETION`='$newPlannedDate', `Expected No.of days for completion`=$newCompletionDays WHERE SNO=$id";
  // mysqli_query($conn, $sql);
   
  // $resultCode = null;
  // execInBackground('python includes/write.py');
      
  // system('python includes/write.py', $resultCode);
  header('Location: project.php?id=' . $id);
  
}

?>
