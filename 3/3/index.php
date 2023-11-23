<?php

include 'page.php';

$page = new Page('ISOK');
$page->description('ISOK Page');
$page->keywords('keyword1, keyword2, keyword3');
$page->robots(true);
$page->body('style="background-color: #f0f0f0;"');

echo $page->display('<h1>Welcome</h1>');
