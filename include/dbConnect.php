<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','app_for_classroom');
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	session_start();
?>