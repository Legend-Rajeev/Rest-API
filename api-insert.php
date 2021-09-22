<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST');
// header('Access-Control-Allow-headers: Content-Type, Access-Control-Allow-Method');


include('config.php');
$data = json_decode(file_get_contents('php://input'), true);

$sname = $data['sname'];
$sage = $data['sage'];
$sgender = $data['sgender'];
$scountry = $data['scountry'];

$sql = "INSERT INTO `details`(`name`, `age`, `gender`, `country`) VALUES ('{$sname}', {$sage}, '{$sgender}', '{$scountry}')";
$result = mysqli_query($conn, $sql) or die('query field!');

if($result){
    echo json_encode(array('message'=>'Data inserted Successfully !', 'status'=>true));
}else{
    echo json_encode(array('message'=>'Data Not Inserted Successfully !', 'status'=>false));
}



?>