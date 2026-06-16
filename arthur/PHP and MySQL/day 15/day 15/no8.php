<?php
$strings = ["abcd", "abc", "de", "hjjj", "g", "wer"];

$lengths = array_map("strlen", $strings);

$shortest = min($lengths);
$longest = max($lengths);

echo "The shortest array length is $shortest. The longest array length is $longest.\n";
?>
