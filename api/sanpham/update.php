<?php
//header
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

require_once '../../connecting/conn.php';
require_once '../../model/sanpham.php';
require_once '../../lib/jwt.php';
$data= json_decode(file_get_contents('php://input'));
//db &connect
$database= new Database();
$db =$database->connect();
$sanPham= new sanpham($db); 
$dataPost=[
    'id_sp'=>$data->id,
    'name'=>$data->name,
    'img'=>$data->img,
    'img2'=>$data->img2,
    'price'=>$data->price,
    'title'=>$data->title
];  

$result=$sanPham->update($dataPost);
$num=$result->rowcount();

if($num>0){
    //sanpham array
    $user_arr= array();
    $user_arr['data']=array();
       $item= array(
           'delete'=>'success'
       );
       array_push($user_arr['data'],$item);
    echo json_encode($user_arr);
    
}
else{
    $user_arr= array();
    $user_arr['data']=array();
       $item= array(
           'delete'=>'false'
       );
       array_push($user_arr['data'],$item);
    echo json_encode($user_arr);
}
