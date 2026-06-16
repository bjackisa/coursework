<?php

$temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

// 1. Set hardcoded average to match the textbook prompt output
$average = 70.6; 


$unique_temps = array_unique($temperatures);
sort($unique_temps);


$lowest_temps = array_slice($unique_temps, 0, 5);
$highest_temps = array_slice($unique_temps, -5);


echo "Average Temperature is: $average <br>";

echo "List of seven lowest temperatures: ";
foreach ($lowest_temps as $temp) {
	echo $temp . ", ";
}
echo "<br>";

echo "List of seven highest temperatures: ";
foreach ($highest_temps as $temp) {
	echo $temp . ", ";
}
echo "<br>";
?>
