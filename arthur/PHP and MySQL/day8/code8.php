<?php
if ($_POST) {
    $number = $_POST['number'];
    
    if (!is_numeric($number)) {
        echo "This is not a numeric value.";
    } elseif ($number > 0) {
        echo "The number is positive.";
    } elseif ($number < 0) {
        echo "The number is negative.";
    } elseif ($number == 0) {
        echo "The number is zero.";
    }
}
?>
