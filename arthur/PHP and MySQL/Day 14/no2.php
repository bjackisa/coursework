<?php
$color = [
'white', 
'green', 
'red'
];

foreach($color as $up){
echo $up . " ";
}
sort ($color);

echo "<ul>";
foreach($color as $rad){
echo "<li>$rad</li>";
}
echo "</ul>";

?>
