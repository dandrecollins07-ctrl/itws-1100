<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// JOIN query
$sql = "
SELECT 
    a.firstname, 
    a.lastname, 
    m.title
FROM actors_movies am
JOIN actors a ON am.actorid = a.actorid
JOIN movies m ON am.movieid = m.movieid
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actors & Movies</title>
</head>
<body>

<h1>Actors and Their Movies</h1>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['firstname'] . " " . $row['lastname'] . " - " . $row['title'] . "<br>";
}
?>

</body>
</html>