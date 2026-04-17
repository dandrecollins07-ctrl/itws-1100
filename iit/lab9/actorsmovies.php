<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

/* ---------- ORIGINAL QUERY (Actors → Movies) ---------- */
$sql = "
SELECT a.firstname, a.lastname, m.title
FROM actors_movies am
JOIN actors a ON am.actorid = a.actorid
JOIN movies m ON am.movieid = m.movieid
";

$result = mysqli_query($conn, $sql);

/* ---------- EXTRA CREDIT QUERY (Movies → Actors) ---------- */
$sql2 = "
SELECT m.title, a.firstname, a.lastname
FROM actors_movies am
JOIN movies m ON am.movieid = m.movieid
JOIN actors a ON am.actorid = a.actorid
";

$result2 = mysqli_query($conn, $sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actors & Movies</title>
</head>
<body>

<h2>Actors and their Movies</h2>

<table border="1">
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Movie</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "</tr>";
}
?>

</table>

<br><br>

<h2>Movies and their Actors</h2>

<table border="1">
<tr>
    <th>Movie</th>
    <th>Actor</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result2)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>