<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> login.php
 * @Purpose : to study apllication programing interface in php
 * @description: Create an Rest Api in Php for login
 * @overview:api for login
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
$userRef=new User($db);

// get email of user to be edited
$data = json_decode(file_get_contents("php://input"));
$userRef->email=$data->email;
$user->password=$data->password;
// read the details of product to be edited
$userRef->readBy("email");
 
if($userRef->firstname!=null && $userRef->email!=null){
    if($userRef->password==md5($user->password)){
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode(array('status' => '200', "message" => "login successful"));
    }
    else{
         // set response code - 503 service unavailable
         http_response_code(503);
         // make it json format
        echo json_encode(array('error' => '400', "message" => "password mismatch"));
    }
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user  does not exist
    echo json_encode(array("message" => "email does not exist."));
}
?>