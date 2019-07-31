<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
require_once '../../connecting/conn.php';
require_once '../../model/sanpham.php';
//db &connect
$database= new Database();
$db =$database->connect();

$sanPham= new sanpham($db);
$result=$sanPham->read();
//get row count
$num=$result->rowcount();

if($num>0){
    //sanpham array
    $sanpham_arr= array();
    $sanpham_arr['data']=array();

    while ($row= $result->fetch(PDO::FETCH_ASSOC)) { //doc tung hang
        extract($row);
       $item= array(
           //'id'=> $row['id_sp']
           'id'=>$id_sp,
           'name'=>$name,
           'img'=>$img,
           'img2'=>$img2,
           'price'=>$price,
           'title'=>$title
       );
       array_push($sanpham_arr['data'],$item);
    }

    echo json_encode($sanpham_arr);
}