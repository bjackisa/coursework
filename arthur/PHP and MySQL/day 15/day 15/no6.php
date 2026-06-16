<?php
$color = ["A" => "Blue", "B" => "Green", "c" => "Red"];

function display_case($color_array, $case) {
	echo "Values are in $case case.\n";
	
	$result = [];
	foreach ($color_array as $key => $value) {
	$is_target = ($value === "Blue" || $value === "Green" || $value === "Red");

	$result[$key] = $is_target ? ($case === "lower" ? strtolower($value) : strtoupper($value)) : $value;
}
	
	print_r($result);
}

// Call the exact same logic twice to show both states
display_case($color, "lower");
display_case($color, "upper");
?>
