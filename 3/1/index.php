<?php
$first = 'files/prva.txt';
$second = 'files/vtora.txt';
$result = 'files/rezultat.txt';

$firstContent = file_get_contents($first);
$firstContent = str_replace('-', ' ', $firstContent);

file_put_contents($result, $firstContent);

$secondContent = file_get_contents($second, true);
file_put_contents($result, $secondContent, FILE_APPEND);

echo 'Done';
