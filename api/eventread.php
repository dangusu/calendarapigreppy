<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");

include '../includes/autoload.inc.php';

$events = new Events();

$data = json_decode(file_get_contents("php://input"));

$events->id = $data->id;

$events->readEvent();

$event_arr = array(
    'id' => $events->id,
    'description' => $events->description,
    'fromdate' => $events->fromdate,
    'todate' => $events->todate,
    'location' => $events->location
);


print_r(json_encode($event_arr));