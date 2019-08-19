<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> read_one.php
 * @Purpose : to study apllication programing interface
 * @description: Create an Rest Api in Php
 * @overview:api for read_one data at a time
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 19-aug-2019
 *******************************************************************************************************************/


// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// set ID property of data to read
$user->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the uer id
$user->readBy("id");

if ($user->firstname != null && $user->email != null) {
    // create array
    $user_arr = array(
        "id" =>  $user->id,
        "firstname" => $user->firstname,
        "lastname" => $user->lastname,
        "email" => $user->email,
        "password" => $user->password,
        "created" => $user->created,
        "modified" => $user->modified
    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($user_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user  does not exist
    echo json_encode(array("message" => "user does not exist."));
}
