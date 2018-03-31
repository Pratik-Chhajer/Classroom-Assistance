<?php

    if(isset($_POST['submit'])){
        require_once('dbConnect.php');
        
        $course_name = $_POST['course_name'];

        $ARRAY = array();
    $P = new stdClass();
    $P->err = 'true';
    $P->name = '';
    $P->present = 0;
    $P->absent = 0;
    $P->total = 0;
    
        if($course_name=='' || $course_name==' '){
            $P->err = "course name field is empty";
            array_push($ARRAY, $P);
        }
        else{
            $sql = "SELECT * FROM course WHERE course_name='$course_name'";
            $res0 = mysqli_query($con,$sql);
            if($res0){
                $row=$res0->fetch_assoc();
                $course_id = $row["id"];
                $sql = "SELECT * FROM attendance WHERE course_id=$course_id";
                $res = mysqli_query($con,$sql);
                if($res){
                    while($row=$res->fetch_assoc()){
                        $user_id = $row['user_id'];
                        $sql = "SELECT * FROM users_info WHERE id=$user_id";
                        $res1 = mysqli_query($con,$sql);
                        if(!$res1){
                            $P->err = "Invalid Query ".$con->error;
                            array_push($ARRAY, $P);
                        }
                        else{
                            $row1=$res1->fetch_assoc();
                            $name = $row1['name'];
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
                            $P = new stdClass();
                            $P->name = $name;
                            $P->err = "true";
                            $P->present = $p;
                            $P->absent = $a;
                            $P->total = $size;
                            if($row["a".$size]==null){
                                $P->status = 'A';    
                            }
                            else{
                                $P->status ='P';
                            }
                            array_push($ARRAY, $P);
                        }
                    }
                }
                else{
                    $P->err = "Invalid Qurey".$con->error;
                    array_push($ARRAY, $P);
                }
            }
            else{
                $P->err = "Invalid Qurey".$con->error;
                array_push($ARRAY, $P);
            }
            
        }
    }
    else{
        $P->err = "Error in input";
        array_push($ARRAY, $P);
    }

    echo json_encode($ARRAY);

?>

