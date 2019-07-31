<?php 
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
$response = array();

if($_FILES['user_profile'])
{
    // Check error
    $error = $_FILES["user_profile"]["error"];
    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else 
    {
        $user_profile_name = $_FILES["user_profile"]["name"];
        // tach chuoi
     
        $arrTmp=explode('.',$user_profile_name);
        $duoiFile=end($arrTmp);
        // ten moi cua file
        $file='file-'.time().'.'.$duoiFile;
        // duong dan file
        $tmp_name = $_FILES["user_profile"]["tmp_name"];
        // duong dan sau khi upload file
        $filePath=$_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file;
        // upload
        $result=move_uploaded_file($tmp_name,$filePath);
        var_dump($filePath);
        if($result) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
              );
        }else{
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
        }
    }
}else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
}
echo json_encode($response);
?>