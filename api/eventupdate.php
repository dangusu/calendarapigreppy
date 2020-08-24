<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include '../includes/autoload.inc.php';

$events = new Events();

$data = json_decode(file_get_contents("php://input"));

$events->id = $data->id;
$events->userid = $data->userid;
$events->description = $data->description;
$events->location = $data->location;        
$events->fromdate = $data->fromdate;        
$events->todate = $data->todate;     

//update event 
if($events->updateEvent()){
    echo json_encode(
            array('message' => 'Event updated')
            );
} else {
    echo json_encode(
             array('message' => 'Event not updated')
            );
}