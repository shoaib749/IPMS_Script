<?php
require_once '../includes/dbOpreations.php';
$response = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['fname']) and
                isset($_POST['lname']) and  
                    isset($_POST['email_id']) and
                        isset($_POST['batch']) and
                        isset($_POST['company_name']) and
                        isset($_POST['start_date']) and
                        isset($_POST['end_date']))
                        {
                        $db = new dbOpreations();
                        $result = $db->addInternship(
                            $_POST['fname'],
                            $_POST['lname'],
                            $_POST['email_id'],
                            $_POST['batch'],
                            $_POST['company_name'],
                            $_POST['start_date'],
                            $_POST['end_date']
                        );
                        if($result == 1){
                            $response['error'] = false;
                            $response['message'] = "Internship Added Successfully";
                        }elseif($result == 2){
                            $response['error'] = true;
                            $response['message'] = "Some error Occurred please try again";
                        }elseif($result == 0){
                            $response['error'] = true;
                            $response['message'] = "Internship Details already exsits";
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
