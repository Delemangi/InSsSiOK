<?php
$uploadDirectory = 'content/';

$uploadedFiles = scandir($uploadDirectory);

$uploadedFiles = array_diff($uploadedFiles, array('.', '..'));

echo '<h2>Uploaded Files:</h2>';
if (empty($uploadedFiles)) {
    echo 'No files uploaded yet.';
} else {
    echo '<ul>';
    foreach ($uploadedFiles as $file) {
        echo '<li>' . $file . '</li>';
    }
    echo '</ul>';
}
