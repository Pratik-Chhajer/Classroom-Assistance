<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $user_id = $_SESSION['user']['id'];
        $course_name = $_POST['course_name'];
        $password = $_POST['password'];

        $data = new stdClass();
        $data->err = "true";

        if($user_id=='' || $user_id==' '){
            $data->err = "user id field is empty";
        }
        else if($course_name=='' || $course_name==' '){
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
                $sql = "SELECT * FROM password WHERE course_id = $course_id";
                $res = mysqli_query($con,$sql);
                if($res){
                    $row = $row=$res->fetch_assoc();
                    $secret = $row['secret'];
                    if($secret==$password){
                        $sql = "SELECT size FROM attendance WHERE course_id = $course_id AND user_id = $user_id";
                        $res1 = mysqli_query($con,$sql);
                        if($res1){
                            if($row=$res1->fetch_assoc()){
                                $size = $row['size'];
                                if($size>0){
                                    $temp_str = (string)$size;
                                    $temp_str = "a".$temp_str;
                                    
                                    $sql = "UPDATE attendance SET $temp_str=now() WHERE user_id=$user_id AND course_id=$course_id";
                                    $res2 = mysqli_query($con,$sql);
                                    if($res2){
                                        $data->err =  "true";
                                    }
                                    else{
                                        $data->err = "Invalid Query : ".$con->error;
                                    }
                                }
                                else{
                                    $data->err =  "Can't mark your attendance";
                                }
                            }
                            else{
                                $data->err = 'error';
                            }
                        }
                        else{
                            $data->err = "Invalid query : ".$con->error;
                        }
                    }
                    else{
                        $data->err = 'Incorrect Password';
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

