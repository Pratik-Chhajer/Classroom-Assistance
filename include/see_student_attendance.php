<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $user_id = $_SESSION['user']['id'];
        $course_name = $_POST['course_name'];

        $data = new stdClass();
        $data->err = "true";

        if($user_id=='' || $user_id==' '){
            $data->err = "user id field is empty";
        }
        else if($course_name=='' || $course_name==' '){
            $data->err = "course name field is empty";
        }
        else{
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM attendance WHERE user_id=$user_id AND course_id=$course_id";
                $res = mysqli_query($con,$sql);
                if($res){
                    $row=$res->fetch_assoc();
                    $size = $row["size"];
                    $p = 0;
                    $a = 0;
                    for($i=1;$i<=$size;$i++){
                        if($row["a".$i]==null){
                            $a++;
                        }
                        else{
                            $p++;
                        }
                    }
                    $data->err = "true";
                    $data->present = $p;
                    $data->absent = $a;
                    $data->total = $size;
                }
                else{
                    $data->err = "Invalid Qurey".$con->error;
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

