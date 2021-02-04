<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT, PATCH");

if($_SERVER['REQUEST_METHOD'] != "PUT" && $_SERVER['REQUEST_METHOD'] != "PATCH") {
    echo "no map found!";
    return;
}

require './../../../autoload.php';

//$data = filter_input_array(FILTER_DEFAULT, INPUT_POST);
$id = $_GET['id'] ?? "";
$data = json_decode(file_get_contents("php://input"));

$user = new \Model\User();
$user->setId($id);
$user->setName($data->name);
$user->setEmail($data->email);
$user->setPassword($data->password);

$USER = new \Dao\User();
echo json_encode($USER->update($user));