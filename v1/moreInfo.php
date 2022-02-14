<?php
require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['fname']) and
        isset($_POST['lname']) and
        isset($_POST['email_id']) and
        isset($_POST['mobNo']) and
        isset($_POST['par_mobNo']) and
        isset($_POST['dept']) and
        isset($_POST['sem']) and
        isset($_POST['regNo']) and 
        isset($_POST['pass10']) and
        isset($_POST['per10']) and
        isset($_POST['admission']) and
        isset($_POST['sgpa1']) and
        isset($_POST['sgpa2']) and
        isset($_POST['sgpa3']) and
        isset($_POST['sgpa4']) and
        isset($_POST['sgpa5']) and
        isset($_POST['avgSgpa']) and
        isset($_POST['passout']) and
        isset($_POST['live']) and
        isset($_POST['dead']) and
        isset($_POST['option1']) and
        isset($_POST['placement_status'])
      //  isset($_POST['gap'])
        ){

            $db = new dbOpreations();
            $result = $db->moreInfo(
                $_POST['fname'],
                $_POST['lname'],
                $_POST['email_id'],
                $_POST['mobNo'],
                $_POST['par_mobNo'],
                $_POST['dept'],
                $_POST['sem'],
                $_POST['regNo'],
                $_POST['pass10'],
                $_POST['per10'],
                $_POST['pass12'],
                $_POST['per12'],
                $_POST['passDip'],
                $_POST['perDip'],
                $_POST['admission'],
                $_POST['sgpa1'],
                $_POST['sgpa2'],
                $_POST['sgpa3'],
                $_POST['sgpa4'],
                $_POST['sgpa5'],
                $_POST['sgpa6'],
                $_POST['sgpa7'],
                $_POST['sgpa8'],
                $_POST['avgSgpa'],
                $_POST['passout'],
                $_POST['live'],
                $_POST['dead'],
                $_POST['option1'],
                $_POST['placement_status'],
                // $_POST['gap']
            );

            if($result == 1){
                $response['error'] = false;
                $response['message'] = "Info added Successfully";
            }elseif($result == 2){
                $response['error']=true;
                $response['message']= "Some error Occurred please try again";
            }
        }else{
            $response['error']  = true;
            $response['message'] = "Required field are missing";
        }
}else{
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}
echo json_encode($response);