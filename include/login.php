<?php

	if(isset($_POST['submit'])){
		require_once('dbConnect.php');
		$email = $_POST['email'];
		$password = $_POST['password'];

		$data = new stdClass();
		$data->err = "true";
		$data->id = 0;
		$data->name = "";

		if($email==''){
			$data->err= "Email field is empty";
		}
		else if($password==''){
			$data->err = "Password field is empty";
		}
		else{
			$sql = "SELECT id,name,password,position FROM users_info WHERE email='$email'";
			$res = mysqli_query($con,$sql);

			if($res){

				if($row=$res->fetch_assoc()){
					$id = $row["id"];
					$name = $row["name"];
					$position = $row["position"];
					$original_hashed_password = $row["password"];
					$position = $row["position"];
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);

					if(!password_verify($password,$original_hashed_password)){
						$data->err= "Incorrect passowrd";
					}
					else{
						$data->id = (int)$id;
						$data->name = $name;
						$data->position = (int)$position;
						$_SESSION['user']['id'] = (int)$id;
						$_SESSION['user']['name'] = $name;
						$_SESSION['user']['email'] = $email;
						$_SESSION['user']['password'] = $password;
						$_SESSION['user']['position'] = (int)$position;
					}
				}
				else{
					$data->err = "Invalid Email address";
				}

			}

			else{
				$data->err = "No such email address found";
			}

		}

	}

	else{
	    $data->err = "Error in input";
	}

	echo json_encode($data);

?>

