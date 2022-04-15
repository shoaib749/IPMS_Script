<?php 
require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email_id'])){
            $db = new dbOpreations();
            $result = $db->getStudentAllInfo(
                $_POST['email_id']
            );
            $response['error'] = false;
            $response['fname'] = $result['fname'];
            $response['lname'] = $result['lname'];
            $response['mobNo'] = $result['mobNo'];
            $response['par_mobNo'] = $result['par_mobNo'];
            $response['dept'] = $result['dept'];
            $response['sem'] = $result['sem'];
            $response['regNo'] = $result['regNo'];
            $response['pass10'] = $result['pass10'];
            $response['per10'] = $result['per10'];
            $response['pass12'] = $result['pass12'];
            $response['per12'] = $result['per12'];
            $response['passDip'] = $result['passDip'];
            $response['perDip'] = $result['perDip'];
            $response['admission'] = $result['admission'];
            $response['sgpa1'] = $result['sgpa1'];
            $response['sgpa2'] = $result['sgpa2'];
            $response['sgpa3'] = $result['sgpa3'];
            $response['sgpa4'] = $result['sgpa4'];
            $response['sgpa5'] = $result['sgpa5'];
            $response['sgpa6'] = $result['sgpa6'];
            $response['sgpa7'] = $result['sgpa7'];
            $response['sgpa8'] = $result['sgpa8'];
            $response['avgSgpa'] = $result['avgSgpa'];
            $response['passout'] = $result['passout'];
            $response['live'] = $result['live'];
            $response['dead'] = $result['dead'];
            $response['option1'] = $result['option1'];
            $response['placement_status'] = $result['placement_status'];
            $response['gap'] = $result['gap'];
    }
    else{
        $response['error'] = true;
        $response['message'] = "Requid fields are missing";
    }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request" ;
}
echo json_encode($response);