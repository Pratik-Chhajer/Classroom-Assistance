<?php
	require_once('../index.php');
	$data = new StdClass;
	$data->id = $_SESSION['user']['id'];
	$data->position = $_SESSION['user']['position'];
	echo json_encode($data);
?>