<?php
include 'includes/config.php';

$id = $_POST['id'];
$lat = $_POST['LAT'];
$long = $_POST['LONG'];
$val = strval($lat).','.strval($long);

$sql = "UPDATE projects SET Location='$val' WHERE SNO=$id";
mysqli_query($conn, $sql);

header("Location: project.php?id=$id")
?>