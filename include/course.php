<?php

	if(true){
		require_once('dbConnect.php');
		$id = $_SESSION['user']['id'];
		$position = $_SESSION['user']['position'];

		$data = new stdClass();
		$data->err = "true";

		if($id<=0){
			$data->err= "id field is empty";
		}
		else if($position!=0 && $position!=1){
			$data->err = "position field is empty";
		}
		else if($position==1){
			$sql = "SELECT * FROM course where faculty=$id";
			$res = mysqli_query($con,$sql);
			if(!$res){
			    $data->err = 'Invalid query: ' . $con->error;
			}
			else{
				$c = 0;
				while($row=$res->fetch_assoc()){
					$c = $c + 1;
					$d = (string)$c;
					$course_name = $row["course_name"];
					$data->$d = $course_name;
				}
				$data->n = $c;
			}

		}
		else if($position==0){

			require_once('dbConnect.php');
			$sql = "SELECT * FROM attendance where user_id=$id";
			$res = mysqli_query($con,$sql);
			if(!$res){
			    $data->err = 'Invalid query: ' . $con->error;
			}
			else{
				$c = 0;
				while($row=$res->fetch_assoc()){
					$course_id = $row["course_id"];
					$sql1 = "SELECT * FROM course where id=$course_id";
					$res1 = mysqli_query($con,$sql1);
					if(!$res1){
						$data->err = 'Invalid query: ' . $con->error;
					}
					else{
					    while($row1=$res1->fetch_assoc()){
					    	$c = $c + 1;
					    	$d = (string)$c;
							$course_name = $row1["course_name"];
							$data->$d = $course_name;
					    }
					}
				}
				$data->n = $c;
			}
		}
	}

	else{
	    $data->err = "Error in input";
	}
	$data->id = $id;
	$data->position = $position;
	echo json_encode($data);

?>

