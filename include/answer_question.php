<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $user_id = $_SESSION['user']['id'];
        $course_name = $_POST['course_name'];
        $answer = $_POST['answer'];
        $answer = strtolower($answer);

        $data = new stdClass();
        $data->err = "true";

        if($user_id=='' || $user_id==' '){
            $data->err = "User id field is empty";
        }
        else if($course_name=='' || $course_name==' '){
            $data->err = "Course name field is empty";
        }
        else if($answer=='' || $answer==' '){
            $data->err = "Answer field is empty";   
        }
        else if($answer != 'a' && $answer !='b' && $answer!='c' && $answer!='d' && $answer!='e'){
            $data->err = "Invalid answer";
        }
        else{
            
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM question_record WHERE user_id=$user_id AND course_id=$course_id AND (answer IS NOT NULL)";
                $res1 = mysqli_query($con,$sql);
                if($res1){
                    if($row=$res1->fetch_assoc()){
                        $data->err = "You have already answered the question";
                    }
                    else{
                        $sql = "UPDATE question_record SET answer='$answer' WHERE user_id=$user_id AND course_id=$course_id";
                        $res2 = mysqli_query($con,$sql);
                        if($res2){
                            $sql = "UPDATE question SET $answer = $answer + 1 WHERE course_id = $course_id ORDER BY time_asked DESC LIMIT 1";
                            $res4 = mysqli_query($con,$sql);
                            if($res4){
                                $data->err = "true";
                            }
                            else{
                                $data->err = "Invalid Query".$con->error;
                            }
                        }
                        else{
                            $data->err = "Invalid Query".$con->error;        
                        }
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