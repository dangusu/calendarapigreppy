<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");

include '../includes/autoload.inc.php';

$events = new Events();

$data = json_decode(file_get_contents("php://input"));

$events->filter = isset($data->filter) ? $data->filter : '';
$events->sort = isset($data->sort) ? $data->sort : '';
$events->eventsids = isset($data->eventsids) ? implode("," ,$data->eventsids) : '';


$result = $events->selectEvents();
$num = $result->rowCount();

if($num > 0) {
    $events_arr = array();
    $events_arr['data'] = array();
    
    while($row = $result->fetch()) {
        extract($row);
        
        $event_item = array (
            'id' => $id,
            'description' => $description,
            'fromdate' => $fromdate,
            'todate' => $todate,
            'location' => $location
        );
        
        array_push($events_arr['data'], $event_item);
    }
    
    //turn to json
    echo json_encode($events_arr);
} else {
    echo json_encode(
            array('message' => 'No events found')
            );
}