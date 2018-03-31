<?php

	if(isset($_POST['submit'])){
		require_once('dbConnect.php');
 		$name = $_POST['name'];
 		$roll = $_POST['roll'];
 		$email = $_POST['email'];
	 	$password = $_POST['password'];
	 	$re_password = $_POST['re_password'];
	 	$position = $_POST['position'];

	 	if($name==''){
	 		$err = "Name field is empty";
	 	}
	 	else if($roll==''){
	 		$err = "Entry Number field is empty";
	 	}
	 	else if($email==''){
	 		$err = "Email field is empty";
	 	}
	 	else if($password==''){
	 		$err = "Password field is empty";
	 	}
	 	else if($re_password==''){
	 		$err = "Re-Password field is empty";
	 	}
	 	else if($password!=$re_password){
	 		$err = "Passwords do not match";
	 	}
	 	else if($position==''){
	 		$err = "Position field is empty";
	 	}
	 	else{
	 		$sql = "SELECT * FROM users_info WHERE email='$email'";
	 		$res = mysqli_fetch_array(mysqli_query($con,$sql));
	 		if(isset($res)){
	 			$err = "Email already exist";
	 		}
	 		elseif (strpos($email, '@') == false || strpos($email, '.') == false){
	 			$err = "Invalid Email address";
	 		}
    		else {
    			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    			if($res){
    				mysqli_free_result($res);
    			}
 				$sql = "INSERT INTO users_info(name,roll,email,password,position) VALUES('$name','$roll','$email','$hashed_password',$position)";
 				$res = mysqli_query($con,$sql);
 				if($res){
 					$err = "true";
 				}
 				else{
 					$err = "Invalid query";
 				}
 			}
	 	}
	}
	else{
		$err = "Error in input";
	}
	$status = new StdClass;
	$status->err = $err;
	$myJSON = json_encode($status);
	echo $myJSON;
 ?>