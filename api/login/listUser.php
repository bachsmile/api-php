<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../connecting/conn.php';
require_once '../../model/login.php';
//db &connect
$database= new Database();
$db =$database->connect();

$loGin= new login($db);
$result=$loGin->read();
//get row count
$num=$result->rowcount();

if($num>0){
    //sanpham array
    $user_arr= array();
    $user_arr['data']=array();

    while ($row= $result->fetch(PDO::FETCH_ASSOC)) { //doc tung hang
        extract($row);
       $item= array(
           'MaID'=>$MaID            ,
           'Username'=>$Username,
           'Password'=>$Password,
           'Authorities'=>$Authorities,
           'Firstname'=>$Firstname,
           'Lastname'=>$Lastname,
           'Gender'=>$Gender,
           'Email'=>$Email,
           'Phone'=>$Phone,
           'Subcrice'=>$Subcrice
       );
       array_push($user_arr['data'],$item);
    }

    echo json_encode($user_arr);
}