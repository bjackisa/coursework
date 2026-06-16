<?php

// The original associative array
$array = array("Abishag"=>"31", "Abishai"=>"41", "Asahel"=>"39", "Olivia"=>"40");

// a) Ascending order sort by Value
echo "<strong>a) Ascending order sort by Value:</strong><br>";
$array_a = $array;
asort($array_a); 
foreach ($array_a as $name => $age) {
echo $name . ": " . $age . "<br>";
}

echo "<br>";

// b) Ascending order sort by Key
echo "<strong>b) Ascending order sort by Key:</strong><br>";
$array_b = $array;
ksort($array_b); 
foreach ($array_b as $name => $age) {
echo $name . ": " . $age . "<br>";
}

echo "<br>";

// c) Descending order sorting by Value
echo "<strong>c) Descending order sorting by Value:</strong><br>";
$array_c = $array;
arsort($array_c); 
foreach ($array_c as $name => $age) {
echo $name . ": " . $age . "<br>";
}

echo "<br>";

// d) Descending order sorting by Key
echo "<strong>d) Descending order sorting by Key:</strong><br>";
$array_d = $array;
krsort($array_d); 
foreach ($array_d as $name => $age) {
echo $name . ": " . $age . "<br>";
}

?>
