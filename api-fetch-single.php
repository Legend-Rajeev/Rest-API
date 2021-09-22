<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include('config.php');

$data = json_decode(file_get_contents('php://input'), true);
$sid = $data['sid'];

$sql = "SELECT * FROM details WHERE id = {$sid}";
$result = mysqli_query($conn, $sql) or die('query field!');

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // print_r($output);
    echo json_encode($output);


}else{
    echo json_encode(
        array(
            'message' => 'No Record Found.', 
            'status' => false
            )
    );
}


?>