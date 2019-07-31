<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
require_once '../../connecting/conn.php';
require_once '../../model/category.php';
//db &connect
$database= new Database();
$db =$database->connect();

$category= new category($db);
$result=$category->read();
//get row count
$num=$result->rowcount();

if($num>0){
    //sanpham array
    $list= array();
    $list['data']=array();

    while ($row= $result->fetch(PDO::FETCH_ASSOC)) { //doc tung hang
        extract($row);
       $item= array(
           //'id'=> $row['id_sp']
           'idDM'=>$idDM,
           'DanhMuc'=>$DanhMuc,
           'parent_id'=>$parent_id
       );
       array_push($list['data'],$item);
    }

    echo json_encode($list);
}