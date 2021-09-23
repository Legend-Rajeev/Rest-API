<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-headers: Content-Type, Access-Control-Allow-Method');


include('config.php');
$data = json_decode(file_get_contents('php://input'), true);

$sid = $data['sid'];
$sname = $data['sname'];
$sage = $data['sage'];
$sgender = $data['sgender'];
// $scountry = $data['scountry'];

$sql = "UPDATE `details` SET `name`='{$sname}' ,`age`= {$sage} ,`gender`='{$sgender}'  WHERE id = {$sid} ";
$result = mysqli_query($conn, $sql) or die('query field!');

if($result){
    echo json_encode(array('message'=>'Data Updated Successfully !', 'status'=>true));
}else{
    echo json_encode(array('message'=>'Faild : Data not inserted !', 'status'=>false));
}



?>