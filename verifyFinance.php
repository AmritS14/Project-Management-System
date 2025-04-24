<?php
session_start();
include("includes/config.php");
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$passFinance = isset($_SESSION['passFinance']) ? $_SESSION['passFinance'] : '';

if ($passFinance == 'true')
{
	header("Location: finance.php?id=$id");
	exit();
}

else
{
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
				if ($row['type'] == 'admin')
				{
					// break;
					$_SESSION['passFinance'] = 'true';
					header("Location: finance.php?id=$id");
					exit();
				}
				else
				{
					$_SESSION['passFinance'] = 'false';
					echo "<script>alert('Unauthorised'); window.location='project.php?id=$id'</script>";
				}
			}
			// echo $row['user'].":".$row['password'];
		}
		// echo $user.":".$password;

		$_SESSION['passFinance'] = 'false';
		echo "<script>alert('Wrong password'); window.location='loginFinance.php?id=$id'</script>";
	}
}
?>