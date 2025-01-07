<?php

include 'config.php';

header('Access-Control-Allow-Origin: *');

if(empty($_FILES)){
    
    $response = [
        'url' => false
    ];

    exit(json_encode($response));
}

if(empty($_FILES['video'])){
    
    $response = [
        'success' => false,
        'file'    => null
    ];

    exit(json_encode($response));
}

$input = $_FILES['video']['tmp_name'];
$filename = time().'.mp4';
$output = "./videos/".$filename;
$teste = getenv('URL')."videos/".$filename;
if(move_uploaded_file($input, $output)){
    $response = [
        'url' => $teste

    ];

    exit(json_encode($response));
}else{
    $response = [
        'success' => false,
        'file'    => null
    ];

    exit(json_encode($response));
}

?>