<?php

$enrique = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$length = 8;

$caldruki = str_shuffle ($enrique);

$adrian = substr ($caldruki, 0, $length);

echo 'Password: ' . $adrian;
?>