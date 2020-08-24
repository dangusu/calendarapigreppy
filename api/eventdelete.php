<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include '../includes/autoload.inc.php';

$events = new Events();

$data = json_decode(file_get_contents("php://input"));

$events->id = $data->id;
$events->userid = $data->userid;

//delete event 
if($events->deleteEvent()){
    echo json_encode(
            array('message' => 'Event deleted')
            ); 
} else {
    echo json_encode(
             array('message' => 'Event not deleted')
            );
}