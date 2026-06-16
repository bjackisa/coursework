<?php

$gad_one = "Hi my name is Gad";
$arthur_one = "Hi my name is Arthur";
$kavuma_one = "Hi my name is kavuma";
$enrique_one = "enrique caldruki";

$gad_two = strtoupper($gad_one);
$arthur_two = strtolower($arthur_one);
$kavuma_two = ucfirst($kavuma_one);
$enrique_two = ucwords($enrique_one);

echo "$gad_two <br>";
echo "$arthur_two <br>";
echo "$kavuma_two <br>";
echo "$enrique_two <br>";
?>