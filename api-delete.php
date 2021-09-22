<?php

header('Content-Type: application/json');
header('Access-Control-Allow-method: PATCH');
header('Access-Control-Allow-Origin: *');

include('config.php');

$data = json_decode(file_get_contents('php://input'), true);
$sid = $data['sid'];

$sql = "DELETE FROM `details` WHERE id = {$sid}";
$result = mysqli_query($conn, $sql) or die('Query Field!');

if($result){
    echo json_encode(array('message'=>'Data Delete Successfully !', 'status'=>true));
}else{
    echo json_encode(array('message'=>'Your data not deleted!', 'status'=>false));
}




?>