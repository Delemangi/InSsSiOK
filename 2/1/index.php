<?php
$numeric = array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$associative = array("Stefan" => "Stefan", "Milev" => "Milev", "Skopje" => "Skopje");
$matrix = array(array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));

print_r($numeric);
print_r($associative);
print_r($matrix);
echo "<br>";

$numericAboveTwenty = array();

foreach ($numeric as $key => $value) {
    echo $key . " " . $value . "<br>";

    if ($value > 20) {
        array_push($numericAboveTwenty, $value);
    }
}

print_r($numericAboveTwenty);
echo "<br>";

$sentence = "PHP is a widely-used general-purpose scripting language that is especially suited for Web development";
$words = explode(" ", $sentence);
$wordLengths = array();

foreach ($words as $key => $value) {
    $wordLengths[$value] = strlen($value);
}

print_r($wordLengths);
echo "<br>";
