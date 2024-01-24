<?php
include 'config.php';

$sql = file_get_contents('supermarket.sql');
$conn->exec($sql);
