<?php

header('Content-Type: application/json');
header('Access-Control-Allow-method: POST');
header('Access-Control-Allow-Origin: *');

include('config.php');

// $search = json_decode(file_get_contents('php://input'), true);
// $search_term = $search['search'];


$search_term = $_GET['name'];

$sql = "SELECT * FROM details WHERE name LIKE '%{$search_term}%'";
$result = mysqli_query($conn, $sql) or die('Query Field!');

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(
        array(
            'message' => 'Your Search Macthed!',
            'status' => false
        )
    );
}




?>