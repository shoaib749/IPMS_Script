<?php
    require_once '../includes/dbOpreations.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['email_id'])){
            $db = new dbOpreations();
            $result = $db->getStudentProfilePic($_POST['email_id']);
            if($result==1){
                $response['error'] = true;
                $response['message'] = "Not found";
            }else{
                
                $response['error'] = false;
                $response['profile_img'] = $result['profile_img'];
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
