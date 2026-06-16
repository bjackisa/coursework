<?php
$array1 = [[77, 87], [23, 45]];
$array2 = ["w3resource", "com"];

$result = [];

foreach ($array1 as $index => $sub_array) {
    $merged_row = array_merge([$array2[$index]], $sub_array);
    $result[$index] = $merged_row;
}

print_r($result);
?>
