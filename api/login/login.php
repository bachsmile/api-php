<?php
//header
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
//header("Access-Control-Allow-Origin: *");      
//header('Content-Type: application/json');
//header('Access-Control-Allow-Methods: POST');
// header('Acess-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
//header('Access-Control-Allow-Headers', 'Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers,X-Access-Token,XKey,Authorization');
require_once '../../connecting/conn_mysqli.php';
require_once '../../model/login.php';
//db &connect
$database= new Database();
$db =$database->connect();

$loGin= new login($db);

//get row count
$data= json_decode(file_get_contents('php://input'));
//var_dump($data);
$item=[
    'Username'=>$data->username,
    'Password'=>$data->password
];
$token = $item;
require_once '../../lib/jwt.php';

$check=$loGin->check($item);

if($check['count_row']!==0){
    $json_token = JWT::encode($token,"login");
   //echo JsonHelper::getJson("token",$json_token);
    $out = array(
        'token' => $json_token,
        'success' => "true",
        'username'=>$item['Username']
    );
    echo json_encode($out);
}else{
    echo json_encode(
        array('success'=>'false')
    );
}