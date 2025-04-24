<?php

include "includes/config.php";

$id = isset($_POST['id']) ? $_POST['id'] : '';
$sql = "SELECT * FROM finances WHERE SNO=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$bAmount = (int)$_POST['Total_Billed_Amount'];
$rAmount = (int)$_POST['TOTAL_Received_Amount'];
$due = $bAmount - $rAmount;
// $_POST['Due_Amount'] = strval((int)$_POST['Total_Billed_Amount'] - (int)$_POST['TOTAL_Received_Amount']);

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

// foreach($_POST as $key=>$value)
// {
//  $key = str_replace('_', ' ', $key);
//  if (array_key_exists($key, $row))
//  {
//    $sql = "UPDATE finances SET `$key`='$value' WHERE SNO=$id";
//    mysqli_query($conn, $sql);
//  }
// }

	$sql = "UPDATE finances SET `Total Billed Amount`='$bAmount', `TOTAL Received Amount`='$rAmount', `Due Amount`='$due' WHERE SNO=$id";
    mysqli_query($conn, $sql);
   
  // $resultCode = null;
  // execInBackground('python includes/writeFinances.py');
  
  header('Location: finance.php?id=' . $id);
  
}



?>
