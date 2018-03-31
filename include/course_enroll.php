<?php

	if(isset($_POST['submit'])){
		require_once('dbConnect.php');
		$id = $_SESSION['user']['id'];
		$course_name = $_POST['course_name'];

		$data = new stdClass();
		$data->err = "true";

		if($id==''){
			$data->err= "id field is empty";
		}
		else if($course_name==''){
			$data->err = "Course Name field is empty";
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
				if($flag==1){
					$sql = "SELECT * FROM attendance WHERE course_id=$course_id";
					$res_check = mysqli_query($con,$sql);
					while($row=$res_check->fetch_assoc()){
						$us_id = $row["user_id"];
						if($us_id==$id){
							$flag = 2;
						}
					}
				}

				if($flag==0){
					$data->err = "$course_name named course doesn't exist";
				}
				else if($flag==2){
					$data->err = "$course_name already registered";
				}
				else{
					$sql = "SELECT * FROM attendance WHERE course_id=$course_id";
					$res11 = mysqli_query($con,$sql);
					if(!$res11){
						$data->err = 'Invalid query: ' . $con->error;
					}
					else{
						$size_attend = 0;
						while($row=$res11->fetch_assoc()){
							$curr_size = $row["size"];
							if($curr_size>$size_attend){
								$size_attend = $curr_size;
							}
						}
						$sql = "INSERT INTO attendance (user_id,course_id,size) VALUES ($id,$course_id,$size_attend)";
						$res12 = mysqli_query($con,$sql);
						if($res12){
							$sql = "INSERT INTO question_record (user_id,course_id,answer) VALUES ($id,$course_id,null)";
							$res13 = mysqli_query($con,$sql);
							if($res13){
								$data->err = "true";
							}
							else{
								$data->err = 'Invalid query: ' . $con->error;	
							}
						}
						else{
							$data->err = 'Invalid query: ' . $con->error;
						}
					}
				}

			}
		}
	}
	else{
	    $data->err = "Error in input";
	}

	echo json_encode($data);

?>

