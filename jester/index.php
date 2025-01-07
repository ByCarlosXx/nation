<?php

include 'config.php';

header('Access-Control-Allow-Origin: *');

if(empty($_FILES)){

    $response = [
        'url' => false
    ];

    exit(json_encode($response));
}

if(empty($_FILES['audio']) && empty($_FILES['image'])){
    
    $response = [
        'success' => false,
        'file'    => null
    ];

    exit(json_encode($response));
}

if(empty($_FILES['audio'])) {
    $input = $_FILES['image']['tmp_name'];
    $filename = time().'.jpg';
    $output = "./images/".$filename;
    $url = getenv('URL')."images/".$filename;
    if(move_uploaded_file($input, $output)){
        $response = [
            'url' => $url
        ];
    
        exit(json_encode($response));
    }else{
        $response = [
            'success' => false,
            'file'    => null
        ];
    
        exit(json_encode($response));
    }

} else {

    $input = $_FILES['audio']['tmp_name'];
    $filename = time().'.webm';
    $output = "./audios/".$filename;
    $url = getenv('URL')."audios/".$filename;
    if(move_uploaded_file($input, $output)){
        $response = [
            'url' => $url
        ];
    
        exit(json_encode($response));
    }else{
        $response = [
            'success' => false,
            'file'    => null
        ];
    
        exit(json_encode($response));
    }
}
