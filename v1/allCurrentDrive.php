<?php
require_once '../includes/dbOpreations.php';
$response = array();

$db = new dbOpreations();
$company = $db->getAllDrive();
$response['error'] = false;
$response = $company;


echo json_encode($response);