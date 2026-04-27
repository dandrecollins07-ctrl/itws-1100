<?php
include 'config.php';

// DELETE
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM movies WHERE movieid = $id");
    header("Location: movies.php");
    exit;
}

// INSERT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = mysqli_prepare($conn, "INSERT INTO movies (title, year) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $_POST['title'], $_POST['year']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>
</head>
<body>

<nav>
    <a href="actors.php">Actors</a> |
    <a href="movies.php">Movies</a> |
    <a href="actorsmovies.php">Actors & Movies</a>
</nav>

<h1>Movies</h1>

<form method="POST">
    <input type="text" name="title" placeholder="Movie Title" required>
    <input type="text" name="year" placeholder="Year" required>
    <button type="submit">Add Movie</button>
</form>

<h2>Movie List</h2>
<?php
$result = mysqli_query($conn, "SELECT * FROM movies");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>" . htmlspecialchars($row['title']) . " (" . htmlspecialchars($row['year']) . ") ";
    echo "<a href='movies.php?delete=" . $row['movieid'] . "' onclick=\"return confirm('Delete this movie?')\">Delete</a></p>";
}
?>

<hr>

<h2>Movies and their Actors</h2>

<table border="1">
<tr>
    <th>Movie</th>
    <th>Actor</th>
</tr>

<?php
$sql = "SELECT movies.title, actors.name
        FROM actors_movies
        JOIN movies ON actors_movies.movieid = movies.movieid
        JOIN actors ON actors_movies.actorid = actors.actorid";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
