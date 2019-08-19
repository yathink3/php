<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> readAll.php
 * @Purpose : to study apllication programing interface
 * @description: Create an Rest Api in Php
 * @overview:api for readAll users in db
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 19-aug-2019
 *******************************************************************************************************************/


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

//get the database connection
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);


$stmt = $user->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // users array
    $user_arr = array();
    $users_arr = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);
        $user_item = array(
            "id" => $id,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "password" => $password,
            "modified" => $modified,
            "created" => $created
        );
        //print_r($user_item);
        array_push($user_arr, $user_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show users data in json format
    echo json_encode($user_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no users found
    echo json_encode(
        array("message" => "No users found.")
    );
}
