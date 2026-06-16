<?php
$host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "users";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
