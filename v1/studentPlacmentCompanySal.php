<?php

require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email_id'])){
        $db = new dbOpreations();
        $result = $db->getStrudentPlacementSal(
            $_POST['email_id']
        );
        // $response['error'] = false;
        $response = $result;
    }else{
        $response['error'] = true ;
        $response['message'] = "Required fileds are missing"; 
    }
    
}else{
    $response['error'] = true ;
    $response['message'] = "Invalid Request" ; 
}
echo json_encode($response);
