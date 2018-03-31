<?php
	require_once('dbConnect.php');
	$sql = "SELECT * FROM course";
	$res = mysqli_query($con,$sql);
	$data = new stdClass();
	$data->err = "true";
	$i = 0;
	if($res){
		while($row=$res->fetch_assoc()){
			$i++;
			$a = (string) $i;
			$data->$a = $row['course_name'];
		}
	}
	else{
		$data->err = 'Invalid query: ' . $con->error;
	}
	echo json_encode($data);
?>