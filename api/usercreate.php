<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include '../includes/autoload.inc.php';

$users = new Users();

$data = json_decode(file_get_contents("php://input"));

$users->email = $data->email;
$users->pass = $data->pass;

//create user
if($users->createUser()){
    echo json_encode(
            array('message' => 'User created')
            );
} else {
    echo json_encode(
             array('message' => 'User not created')
            );
}