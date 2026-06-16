<?php
$rad = 200;

while ($rad <= 248) {
    echo $rad . " ";
    $rad = ($rad % 4 === 0) ? ($rad + 4) : $rad;
}
?>
