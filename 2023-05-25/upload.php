<?php

if ($_FILES) {
    $uploadDir = '/tmp/upload_photo/'; // Upload directory path
    // https://www.php.net/manual/en/function.file-exists.php
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $formats = [
        "png" => "image/png",
        "gif" => "image/gif",
        "svg" => "image/svg",
        "jpg" => "image/jpg",
        "jpeg" => "image/jpeg"
    ];

    // https://www.php.net/manual/en/function.basename.php
    $fileName = basename($_FILES["picture"]["name"]);
    $tmpName = $_FILES["picture"]["tmp_name"];
    $fileType = $_FILES["picture"]["type"];

    // Check if format is OK
    if (in_array($fileType, $formats)) {
        if (move_uploaded_file($tmpName, $uploadDir . $fileName)) {
            echo "Successful upload." . PHP_EOL;
        } else {
            echo "Unsuccessful upload!" . PHP_EOL;
        }
    } else {
       echo "Unrecognized file format!" . PHP_EOL;
    }
} else {
    echo "Something went wrong! :-|" . PHP_EOL;
}
