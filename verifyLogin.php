<?php
session_start();
include("includes/config.php");

$user = isset($_POST['user']) ? $_POST['user'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

if ($numRows > 0)
{
	for ($i = 0; $i < $numRows; $i++)
	{
		$row = mysqli_fetch_assoc($result);
		if ($row['user'] == $user && $row['password'] == $password)
		{
			// break;
			$_SESSION['passLogin'] = 'true';
			if ($row['type'] == 'admin' || $row['type'] == 'editor') 
				$_SESSION['editor'] = 'true';
			else
				$_SESSION['editor'] = 'false';
			$_SESSION['user'] = $user;
			$_SESSION['userType'] = $row['type'];
			header("Location: index.php");
			exit();
		}
		// echo $row['user'].":".$row['password'];
	}
	// echo $user.":".$password;

	$_SESSION['passLogin'] = 'false';
	echo "<script>alert('Wrong password'); window.location='login.php';</script>";
}
?>