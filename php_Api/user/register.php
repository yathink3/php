<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));


// make sure data is not empty
if(
    !empty($data->firstname) &&
    !empty($data->lastname) &&
    !empty($data->email) &&
    !empty($data->password)
){
 
    // set user property values
    $user->firstname=$data->firstname;
    $user->lastname=$data->lastname;
    $user->email=$data->email;
    $user->password=md5($data->password);
    $user->created = date('Y-m-d H:i:s');
    $user->modified = date('Y-m-d H:i:s');
    
    // create the user
    if($user->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // displays
        echo json_encode(array("message" => "user was created."));
    }
 
    // if unable to create the user,
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // display message
        echo json_encode(array("message" => "Unable to create user."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}
