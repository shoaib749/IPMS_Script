<?php 
require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['c_name'])){
            $db = new dbOpreations();
            $company = $db->getCurrentDrive(
                $_POST['c_name']
            );
            $response['error'] = false;
            $response['c_name'] = $company['c_name'];
            $response['sal_lpa'] = $company['sal_lpa'];
            $response['elig_crit'] = $company['elig_crit'];
            $response['date_drive'] = $company['date_drive'];
            $response['batch'] = $company['batch'];
        }else{
            $response['error'] = true;
            $response['message'] = "Requid fields are missing";
        }

}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request" ;
}
echo json_encode($response);