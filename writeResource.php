<?php
include "includes/config.php";

$id = isset($_POST['id']) ? $_POST['id'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$person = isset($_POST['person']) ? $_POST['person'] : '';
$task = isset($_POST['task']) ? $_POST['task'] : '';

if ($id != '')
{
	$sql = "INSERT INTO resources (projectId, `date`, personName, task) VALUES ($id, '$date', '$person', '$task')";
	mysqli_query($conn, $sql);

	header("Location: project.php?id=$id");
}