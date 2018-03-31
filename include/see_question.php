<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        $course_name = $_POST['course_name'];

        $data = new stdClass();
        $data->err = "true";
        $data->question = " ";

        if($course_name=='' || $course_name==' '){
            $data->err = "course name field is empty";
        }
        else{
            
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM question WHERE course_id = $course_id ORDER BY time_asked DESC LIMIT 1";
                $res1 =  mysqli_query($con,$sql);
                if($res1){
                    $row=$res1->fetch_assoc();
                    $data->err = "true";
                    $data->question = $row['question_text'];
                    $data->a_option = $row['a_option'];
                    $data->b_option = $row['b_option'];
                    $data->c_option = $row['c_option'];
                    $data->d_option = $row['d_option'];
                    $data->e_option = $row['e_option'];
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

