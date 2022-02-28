<?php
require_once '../includes/dbOpreations.php';
$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['c_name']) and
            isset($_POST['sal_lpa']) and
                isset($_POST['elig_crit']) and
                    isset($_POST['date_drive']) and
                        isset($_POST['batch']))
                        {
                            $db = new dbOpreations();
                            $result = $db->addCurentDrive(
                                $_POST['c_name'],
                                $_POST['sal_lpa'],
                                $_POST['elig_crit'],
                                $_POST['date_drive'],
                                $_POST['batch']
                            );
                            if($result == 0){
                                $response['error'] = true;
                                $response['message'] = "Current Drive Already Registred";
                            }elseif($result == 1){
                                $response['error'] = false;
                                $response['message'] = "Current Drive Added Successfully";
                            }elseif($result == 2){
                                $response['error'] = true;
                                $response['message'] = "Some Error Occur Try somethime later";
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