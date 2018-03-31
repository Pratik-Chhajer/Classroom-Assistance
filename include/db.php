<?php
	define('HOST','mysql.hostinger.in');
	define('USER','u820531637_root');
	define('PASS','app_for_classroom');
	define('DB','u820531637_class');
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	session_start();
?>