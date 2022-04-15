<?php 
require_once '../includes/dbOpreations.php';
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['c_name'])
            AND isset($_POST['batch'])){
        $db = new dbOpreations();
        $company = $db->getCurrentIntenship(
            $_POST['c_name'],
            $_POST['batch']
        );
        $response['error'] = false;
        $response['c_name'] = $company['company_name'];
        $response['el_criteria'] = $company['el_criteria'];
        $response['date_start'] = $company['date_start'];
        $response['duration'] = $company['duration'];
        $response['batch'] = $company['batch'];
        $response['reg_link'] = $company['reg_link'];
    }else{
        $response['error'] = true;
        $response['message'] = "Requid fields are missing";
    }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request" ;
}
echo json_encode($response);