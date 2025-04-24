<?php
include "includes/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '')
{
	$sql = "DELETE FROM projects WHERE SNO=$id";
	mysqli_query($conn, $sql);

	$resultCode = null;
    
  	system('python includes/write.py', $resultCode);
  	header('Location: index.php');
}