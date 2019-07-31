<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Acess-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
require_once '../../connecting/conn.php';
require_once '../../model/sanpham.php';
//db &connect
$database= new Database();
$db =$database->connect();

$sanPham= new sanpham($db);

//get row count
$data= json_decode(file_get_contents('php://input'));
$item=[
    'name'=>$data->name,
    'img'=>$data->img,
    'img2'=>$data->img2,
    'price'=>$data->price,
    'title'=>$data->title
];

$check=$sanPham->create($item);

if($check){
    echo json_encode(
        array('message'=>'Success')
    );
}else{
    echo json_encode(
        array('message'=>'not create !')
    );
}