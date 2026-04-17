<?php

// connect to database
$conn = mysqli_connect("localhost", "phpmyadmin", "password", "iit");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>