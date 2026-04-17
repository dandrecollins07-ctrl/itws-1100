<?php
include 'config.php';

$sql = "
SELECT a.firstname, a.lastname, m.title
FROM actors_movies am
JOIN actors a ON am.actorid = a.actorid
JOIN movies m ON am.movieid = m.movieid
";

$result = mysqli_query($conn, $sql);
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

</body>
</html>