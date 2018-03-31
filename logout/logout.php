<?php
session_start();
unset($_SESSION['user']);
require_once('../include/dbConnect.php');
header("LOCATION: ../login/login.php");
?>