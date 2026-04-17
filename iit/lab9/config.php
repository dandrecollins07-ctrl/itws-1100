<?php
$conn = mysqli_connect("localhost", "phpmyadmin", "", "iit");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>