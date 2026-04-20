<?php
// SHOW ERRORS (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// CONNECT TO DATABASE
$conn = mysqli_connect("localhost", "phpmyadmin", "password", "iit");

// CHECK CONNECTION
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// QUERY
$sql = "SELECT * FROM actors";
$result = mysqli_query($conn, $sql);

// CHECK QUERY
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actors</title>
</head>
<body>

<h1>Actors List</h1>

<?php
// DISPLAY DATA
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['firstname'] . " " . $row['lastname'] . "<br>";
}
?>

</body>
</html>
