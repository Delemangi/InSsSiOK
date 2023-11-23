<?php

$name = $_GET["ime"];
$surname = $_GET["prezime"];
$email = $_GET["email"];
$sex = $_GET["pol"];

$isNotSet = !isset($name) || !isset($surname) || !isset($email) || !isset($sex);
$isEmptyString = $name == "" || $surname == "" || $email == "" || $sex == "";

if ($isNotSet || $isEmptyString) {
    echo "Please fill in all the fields!";
    exit();
}

echo "NAME: " . $name . "; SURNAME: " . $surname . "; EMAIL: " . $email . "; SEX: ";

if ($sex == 1) {
    echo "male";
} else {
    echo "female";
}
