<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'config.php';

$sql = "SELECT * FROM actors";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['firstname'] . " " . $row['lastname'] . "<br>";
}
?>