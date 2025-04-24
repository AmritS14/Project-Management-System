<?php

include "includes/config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$sql = "SELECT * FROM projects WHERE SNO=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($id != '')
{



// $newCompanyName = isset($_POST['newCompanyName']) ? $_POST['newCompanyName'] : '';
// $newStatus = isset($_POST['newStatus']) ? $_POST['newStatus'] : '';
// $newOrderRcvdDate = isset($_POST['newOrderRcvdDate']) ? $_POST['newOrderRcvdDate'] : '';
// $newStartDate = isset($_POST['newStartDate']) ? $_POST['newStartDate'] : '';
// $newCompletionDays = isset($_POST['newCompletionDays']) ? $_POST['newCompletionDays'] : '';
// $newPlannedDate = isset($_POST['newPlannedDate']) ? $_POST['newPlannedDate'] : '';


  


  foreach($_POST as $key=>$value)
  {
    // echo "$key<br>"; 
    $key = str_replace('_', ' ', $key);
    $key = str_replace('No ', 'No.', $key);
    if (array_key_exists($key, $row))
    {
      $sql = "UPDATE projects SET `$key`='$value' WHERE SNO=$id";
      mysqli_query($conn, $sql);

    }
    // echo "$key<br>";
  }


  // $sql = "UPDATE projects SET `NAME OF CLIENT`='$newCompanyName', STATUS='$newStatus', `Dt of order recd`='$newOrderRcvdDate', `START DATE`='$newStartDate', `PLANNED DT COMPLETION`='$newPlannedDate', `Expected No.of days for completion`=$newCompletionDays WHERE SNO=$id";
  // mysqli_query($conn, $sql);
   
  // $resultCode = null;
  // execInBackground('python includes/write.py');
      
  // system('python includes/write.py', $resultCode);
  header('Location: project.php?id=' . $id);
  
}

?>
