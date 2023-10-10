<?php 
	include_once('../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `jp_students` WHERE `id` = $id";
	mysqli_query($conn, $sql);
?>