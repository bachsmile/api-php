<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Acess-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
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
    'Password'=>$data->password,
    'Firstname'=>$data->firstname,
    'Lastname'=>$data->lastname,
   'Email'=>$data->email,
    'Phone'=>$data->telephone,
    'Subcrice'=>$data->Subscribe,
];
// $item2=[
//     'Username'=>$_GET['username'],
//     'Password'=>$_GET['password']
// ];
$check=$loGin->check($item);
if($check['count_row']!==0){
    echo json_encode(
        array('message'=>'Đã tồn tại')
    );
}
else if($item['Username']=='' || $item['Password']==''){
    echo json_encode(
        array('message'=>'username or password erorr!')
    );
}
else{
    $register=$loGin->create($item);
    echo json_encode(
        array('message'=>'Success')
    );
}