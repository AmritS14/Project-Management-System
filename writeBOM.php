<?php

include "includes/config.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';

// echo 'SNo.: '.$sNo."\n";
// if (isset($_POST['SNo.']))
//   {
//     echo "true";}
//     else
//       {echo "false";}

 // foreach($_POST as $key=>$value)
 // {
 //  echo "$key : $value\n";
 // }

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
    $key = explode('_', $key);
    $itemId = $key[1];
    $sql = "SELECT itemId FROM bom_list WHERE itemId='$itemId' AND projectId=$id";
    // echo "$sql<br>";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0)
    {
      if (($key[0] == 'itemQty') || ($key[0] == 'itemDispatch') || ($key[0] == 'projectId')){
        $sql="UPDATE bom_list SET $key[0]=$value WHERE itemId='$itemId' AND projectId=$id";
        //mysqli_query($conn, $sql);
        // echo "$sql<br>";
      }

      else{
        $sql="UPDATE bom_list SET $key[0]='$value' WHERE itemId='$itemId' AND projectId=$id";
        // echo "$sql<br>";
        // mysqli_query($conn, $sql);
      }
      
    }
    else
    {
      $sql = "INSERT INTO bom_list (projectId, itemId) VALUES ($id, '$value')";
      // echo $sql;
      //mysqli_query($conn, $sql);
    }
    // echo "$key[0] $key[1]<br>";
    mysqli_query($conn, $sql);
  }

  // $sql = "INSERT INTO bom_list (itemSpec) VALUES ('$value') WHERE SNO=$id";


  // $sql = "UPDATE projects SET `NAME OF CLIENT`='$newCompanyName', STATUS='$newStatus', `Dt of order recd`='$newOrderRcvdDate', `START DATE`='$newStartDate', `PLANNED DT COMPLETION`='$newPlannedDate', `Expected No.of days for completion`=$newCompletionDays WHERE SNO=$id";
  // mysqli_query($conn, $sql);
   
  // $resultCode = null;
  // execInBackground('python includes/writeBOM.py');
  
  header('Location: project.php?id='.$id);
  
}



?>
