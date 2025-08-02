<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include dirname(__DIR__).'/config/database.php';
include dirname(__DIR__).'/models/User.php';
//creating the object for database class
$database = new Database();
//establishing the connection
$db = $database->connect();
//creating the object for user class
$user = new User($db);
//starting the session
session_start();
//getting the json request and decoding it
$data = json_decode(file_get_contents("php://input"));

// Login endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data->action) && $data->action === 'login') {
    //getting the user name and password
    $user->username = $data->username;
    $user->password = $data->password;
    //getting the session id and status
    $session_id = session_id();
    $session_status = session_status();
    //validating the user login function 
    if($user->login()) {
        //setting up the result and encoding the result as json response
        http_response_code(200);
        echo json_encode([
            'message' => 'Login successful',
            'user_id' => $user->id,
            'gender'=> $user->gender,
            'mobileno'=>$user->mobileno,
            'email' => $user->email,
            'session_id'=> $session_id,
            'session_status'=>$session_status == 2 ? 'active' : 'Not Active'
        ]);
    } else {
        //setting the response code for failed login 
        http_response_code(401);
        echo json_encode(['message' => 'Login failed']);
    }
}

// Logout endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data->action) && $data->action === 'logout') {
    //getting the generated session id
    $session_id = session_id();
    //checking the session id is already set
    if(isset($session_id)) {
        //usetting and destroying the session already created
        session_unset();
        session_destroy();
        //setting up the response code and encoding the result
        http_response_code(200);
        echo json_encode([
            'message' => 'Logged out successfully'
        ]);
    } 
}
?>