<?php

	if(isset($_POST['submit'])){
		require_once('dbConnect.php');
		$id = $_SESSION['user']['id'];
		$course_name = $_POST['course_name'];

		$data = new stdClass();
		$data->err = "true";

		if($id=='' || $id==' '){
			$data->err= "id field is empty";
		}
		else if($course_name=='' || $course_name==' '){
			$data->err = "course_name field is empty";
		}
		else{
			
			$sql = "SELECT * FROM course";
			$res = mysqli_query($con,$sql);
			if(!$res){
				$data->err = 'Invalid query: ' . $con->error;
			}
			else{
				$flag = 0;
				$size_ans = 0;
				$size_attend = 0;
				
				while($row=$res->fetch_assoc()){
					$na = $row["course_name"];
					if($na == $course_name){
						$flag = 1;
						$course_id = $row["id"];
					}
				}

				if($flag==0){
					$sql = "INSERT INTO course (course_name,faculty) VALUES ('$course_name',$id)";
					$res1 = mysqli_query($con,$sql);
					if($res1){
						$sql = "SELECT * from course WHERE course_name='$course_name'";
						$res2 = mysqli_query($con,$sql);
						if($row=$res2->fetch_assoc()){
							$course_id = $row["id"];
							$sql = "INSERT INTO password (secret,course_id) VALUES ('password',$course_id)";
							$res3 = mysqli_query($con,$sql);
							if($res3){
								$data->err = "true";
							}
							else{
								$data->err = "error";
							}
						}
						else{
							$data->err = "error";
						}
					}
					else{
						$data->err = 'Invalid query: ' . $con->error;
					}
				}
				else{
					$data->err = "$course_name named course already exist";
				}
			}
		}
	}
	else{
	    $data->err = "Error in input";
	}

	echo json_encode($data);

?>

