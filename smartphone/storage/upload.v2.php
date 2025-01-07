<?php

header('Access-Control-Allow-Origin: *');

if (empty($_FILES)) {
    $response = [
        'url' => false
    ];

    exit(json_encode($response));
}

if (empty($_FILES['video'])) {
    $response = [
        'success' => false,
        'file'    => null
    ];

    exit(json_encode($response));
}

$input = $_FILES['video']['tmp_name'];
$filename = time() . '.mp3';
$output = "./videos/" . $filename;
$videoUrl = "http://181.215.254.182/smartphone/storage/videos/" . $filename;

if (move_uploaded_file($input, $output)) {
    $response = [
        'url' => $videoUrl
    ];

    exit(json_encode($response));
} else {
    $response = [
        'success' => false,
        'file'    => null
    ];

    exit(json_encode($response));
}
