<?php
$DB_HOST = "localhost";
$DB_USER = "phpmyadmin";
$DB_PASS = "password";
$DB_NAME = "iit";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>