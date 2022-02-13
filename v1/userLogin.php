<?php

require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email_id']) and isset($_POST['pass'])){
        $db=new dbOpreations();
        if($db->userLogin($_POST['email_id'],$_POST['pass'])){
            $user = $db->getUserByUsername(($_POST['email_id']));
            $response['error'] = false;
            $response['fname'] = $user['fname'];
            $response['lname'] = $user['lname'];
            $response['email_id'] = $user['email_id'];

        }else{
            $response['error'] = true;
            $response['message'] ="Invalid Email or Password" ;
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Required Fields are missing"; 
    }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request"; 
}
echo json_encode($response);

