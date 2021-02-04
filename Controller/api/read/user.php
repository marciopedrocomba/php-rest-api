<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

if($_SERVER['REQUEST_METHOD'] != "GET") {
    echo "no map found!";
    return;
}

require './../../../autoload.php';

$USER = new \Dao\User();

$userData = [];

foreach ($USER->read() as $user) {

    $userData[] = $user;

}

echo json_encode($userData);