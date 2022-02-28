<?php

require_once '../includes/dbOpreations.php';
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email_id'])){  
        $db = new dbOpreations();
        $count = $db->countIndiOffer($_POST['email_id']);
        $response['error'] = false;
        $response['count'] = $count;
    }else{  
        $response['error'] = true;
        $response['message'] = 'Required Fields are missing';
    }

}else{
    $response['error'] = true;
    $response['message'] = 'Invalid Request';
}
echo json_encode($response);