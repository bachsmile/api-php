<?php
//header
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

require_once '../../connecting/conn.php';
require_once '../../model/login.php';
require_once '../../lib/jwt.php';
$data= json_decode(file_get_contents('php://input'));
//db &connect
$database= new Database();
$db =$database->connect();
$loGin= new login($db);
$dataPost=[
    'Username'=>$data->username,
];  
//mã hóa token ra json
// $token=JWT::decode($item['Token'],"login");
// $dum[]=$token;
$result=$loGin->user($dataPost['Username']);
$num=$result->rowcount();

if($num>0){
    //sanpham array
    $user_arr= array();
    $user_arr['data']=array();

    while ($row= $result->fetch(PDO::FETCH_ASSOC)) { //doc tung hang
        extract($row);
       $item= array(
           'MaID'=>$MaID,
           'Username'=>$Username,
           'Password'=>$Password,
           'Authorities'=>$Authorities,
           'Firstname'=>$Firstname,
           'Lastname'=>$Lastname,
           'Email'=>$Email,
           'Phone'=>$Phone,
           'Subcrice'=>$Subcrice
       );
       array_push($user_arr['data'],$item);
    }

    echo json_encode($user_arr);
}
