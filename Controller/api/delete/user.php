<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

if($_SERVER['REQUEST_METHOD'] != "DELETE") {
    echo "no map found!";
    return;
}

require './../../../autoload.php';

$id = $_GET['id'] ?? "";

$USER = new \Dao\User();
echo json_encode($USER->delete($id));