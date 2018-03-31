<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $course_name = $_POST['course_name'];
        $password = $_POST['password'];

        $data = new stdClass();
        $data->err = "true";

        if($course_name=='' || $course_name==' '){
            $data->err = "course name field is empty";
        }
        else if($password=='' || $password==' '){
            $data->err = "password field is empty";   
        }
        else{
            
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "UPDATE attendance SET size = size + 1 WHERE course_id = $course_id";
                $res = mysqli_query($con,$sql);
                if($res){
                    $sql = "UPDATE password SET secret = '$password' WHERE course_id = $course_id";
                    $res1 = mysqli_query($con,$sql);
                    if($res1){
                        $data->err = 'true';
                    }
                    else{
                        $data->err = "Invalid Query".$con->error;
                    }
                }
                else{
                    $data->err = "Invalid Query".$con->error;
                }
            }
            else{
                $data->err = "Invalid Qurey".$con->error;
            }
            
        }
    }
    else{
        $data->err = "Error in input";
    }

    echo json_encode($data);

?>

