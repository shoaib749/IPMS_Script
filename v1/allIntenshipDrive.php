<?php
require_once '../includes/dbOpreations.php';
$response = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new dbOpreations();
    $company = $db->allInternshipDrive();
    $response['error'] = false;
    $response = $company;
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request" ;
}
echo json_encode($response);