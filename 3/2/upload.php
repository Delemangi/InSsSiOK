<?php
$uploadDirectory = 'content/';
$maxFileSize = 300 * 1024; // 300 KB

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        if ($file['size'] <= $maxFileSize) {
            $destination = $uploadDirectory . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo 'File uploaded successfully.';
            } else {
                echo 'Error uploading file.';
            }
        } else {
            echo 'File size exceeds the limit.';
        }
    } else {
        echo 'Error during file upload.';
    }
}
