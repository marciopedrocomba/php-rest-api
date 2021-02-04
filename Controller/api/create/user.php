<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

if($_SERVER['REQUEST_METHOD'] != "POST") {
    echo "no map found!";
    return;
}

require './../../../autoload.php';

//$data = filter_input_array(FILTER_DEFAULT, INPUT_POST);
$data = json_decode(file_get_contents("php://input"));

$user = new \Model\User();
$user->setName($data->name);
$user->setEmail($data->email);
$user->setPassword($data->password);

$USER = new \Dao\User();
echo json_encode($USER->save($user));