<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        
        $course_name = $_POST['course_name'];

        $data = new stdClass();
        $data->err = "true";

        if($course_name=='' || $course_name==' '){
            $data->err = "course name field is empty";
        }
        else{

            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM question_record WHERE course_id=$course_id";
                $res = mysqli_query($con,$sql);
                if($res){
                    $fp = fopen("../doc/response.csv","w");
                    $field = array("Name","Answer");
                    fputcsv($fp,$field);
                    while($row=$res->fetch_assoc()){
                        $user_id = $row['user_id'];
                        $sql = "SELECT * FROM users_info WHERE id=$user_id";
                        $res1 = mysqli_query($con,$sql);
                        if(!$res1){
                            $data->err = "Invalid Query ".$con->error;
                        }
                        else{
                            $row1=$res1->fetch_assoc();
                            $name = $row1['name'];
                            $answer = $row['answer'];
                            $err = "true";
                            $field = array($name,$answer);
                            fputcsv($fp,$field);
                        }
                    }
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

