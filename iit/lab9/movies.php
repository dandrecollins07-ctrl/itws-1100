<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<body>

<h1>Movies</h1>

<form method="POST">
    <input type="text" name="title" placeholder="Movie Title" required>
    <input type="number" name="year" placeholder="Year" required>
    <button type="submit">Add Movie</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $mysqli->prepare("INSERT INTO movies (title, year) VALUES (?, ?)");
    $stmt->bind_param("si", $_POST['title'], $_POST['year']);
    $stmt->execute();
}

$result = $mysqli->query("SELECT * FROM movies");

while ($row = $result->fetch_assoc()) {
    echo "<p>" . htmlspecialchars($row['title']) . " (" . $row['year'] . ")</p>";
}
?>

</body>
</html>