<?php

require_once '../includes/dbOpreations.php';
$response = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['fname']) and
                isset($_POST['lname']) and  
                    isset($_POST['email_id']) and
                        isset($_POST['pass']))
                        {
                        $db = new dbOpreations();
                        $result = $db->createUser(
                            $_POST['fname'],
                            $_POST['lname'],
                            $_POST['email_id'],
                            $_POST['pass'],
                        );
                        if($result == 1){
                            $response['error'] = false;
                            $response['message'] = "User Created Successfully";
                        }elseif($result == 2){
                            $response['error'] = true;
                            $response['message'] = "Some error Occurred please try again";
                        }elseif($result == 0){
                            $response['error'] = true;
                            $response['message'] = "User already exsits";
                        }
                    }else{
                        $response['error'] = true;
                        $response['message'] = "Requid fields are missing";
                    }

    }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request" ; 
    }
    echo json_encode($response);