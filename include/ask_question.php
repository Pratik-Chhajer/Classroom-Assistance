<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $user_id = $_SESSION['user']['id'];
        $course_name = $_POST['course_name'];
        $question_text = $_POST['question'];
        $a_option = $_POST['a_option'];
        $b_option = $_POST['b_option'];
        $c_option = $_POST['c_option'];
        $d_option = $_POST['d_option'];
        $e_option = $_POST['e_option'];
        $answer = 'x';

        $data = new stdClass();
        $data->err = "true";

        if($user_id=='' || $user_id==' '){
            $data->err = "user id field is empty";
        }
        else if($course_name=='' || $course_name==' '){
            $data->err = "course name field is empty";
        }
        else if($question_text=='' || $question_text==' '){
            $data->err = "question field is empty";   
        }
        else if($answer==''){
            $data->err = "answer field is empty";
        }
        else{
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM attendance WHERE course_id=$course_id";
                $res1 =  mysqli_query($con,$sql);
                if($res1){
                    $size = 0;
                    while($row=$res1->fetch_assoc()){
                        $size++;
                    }
                    $sql = "INSERT INTO question(question_text, a_option, b_option, c_option, d_option, e_option,course_id,answer,time_asked,size) VALUES('$question_text','$a_option','$b_option','$c_option','$d_option','$e_option',$course_id,'$answer',now(),$size)";
                    $res2 = mysqli_query($con,$sql);
                    if($res2){
                        $sql = "UPDATE question_record SET answer=null WHERE course_id=$course_id";
                        $res3 = mysqli_query($con,$sql);
                        if($res3){
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

