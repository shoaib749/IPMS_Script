<?php

require_once '../includes/dbOpreations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $db = new dbOpreations();
    $TotalOfferCount = $db->countTotaloffer();
 //   $TotalStudentCount = $db->countStudentOffer();
    $TotalInternshipCount = $db->countInternship();
    $response['error'] = false;
    $response['TotalOfferCount'] = $TotalOfferCount;
   // $response['TotalStudentCount'] = $TotalStudentCount; 
    $response['TotalIntenshipCount'] = $TotalInternshipCount;
}else{
    $response['error'] = true ;
    $response['message'] = "Invalid Request" ; 
}
echo json_encode($response);