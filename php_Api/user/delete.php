<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> delete.php
 * @Purpose : to study apllication programing interface in php
 * @description: Create an Rest Api in Php
 * @overview:api for delete
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 19-aug-2019
 *******************************************************************************************************************/

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// get user data
$data = json_decode(file_get_contents("php://input"));
 
// set user id to be deleted
$user->id = $data->id;

$user->readBy("id");

if($user->firstname!=null && $user->email!=null){
    // delete the user
    if($user->delete()){
    
        // set response code - 200 ok
        http_response_code(200);
    
        // tell the user
        echo json_encode(array("message" => "user was deleted."));
    }
    
    // if unable to delete the user
    else{
    
        // set response code - 503 service unavailable
        http_response_code(503);
    
        // tell the user
        echo json_encode(array("message" => "Unable to delete user."));
    }
}else{
     // set response code - 404 Not found
     http_response_code(404);
 
     // tell the user  does not exist
     echo json_encode(array("message" => "user does not exist."));
}
?>