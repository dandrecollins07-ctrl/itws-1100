<?php 
include('inclassexample/includes/init.inc.php');
include('inclassexample/includes/functions.inc.php');
?>

<title>Movies - ITWS</title>

<?php include('inclassexample/includes/head.inc.php'); ?>

<h1>Movies</h1>

<?php include('inclassexample/includes/menubody.inc.php'); ?>

<?php
$dbOk = false;

// include config (IMPORTANT)
include('config.php');

// connect using template variables
@ $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
    $dbOk = true;
}

// HANDLE FORM
$havePost = isset($_POST["save"]);
$errors = '';

if ($havePost && $dbOk) {
    $title = htmlspecialchars(trim($_POST["title"]));
    $year = htmlspecialchars(trim($_POST["year"]));

    if ($title == '') {
        $errors .= '<li>Title may not be blank</li>';
    }
    if ($year == '') {
        $errors .= '<li>Year may not be blank</li>';
    }

    if ($errors != '') {
        echo '<div class="messages"><ul>' . $errors . '</ul></div>';
    } else {
        $stmt = $db->prepare("INSERT INTO movies (title, year) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $year);
        $stmt->execute();
        $stmt->close();
    }
}

// HANDLE DELETE
if (isset($_GET["delete"]) && $dbOk) {
    $id = intval($_GET["delete"]);
    $db->query("DELETE FROM movies WHERE movieid = $id");
}
?>

<h2>Add Movie</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Movie Title" required>
    <input type="text" name="year" placeholder="Year" required>
    <input type="submit" name="save" value="Add Movie">
</form>

<h2>Movie List</h2>

<?php
if ($dbOk) {
    $result = $db->query("SELECT * FROM movies");

    while ($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row["title"]) . " (" . htmlspecialchars($row["year"]) . ") ";
        echo "<a href='movies.php?delete=" . $row["movieid"] . "'>Delete</a></p>";
    }
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
if ($dbOk) {
    $sql = "SELECT movies.title, actors.name
            FROM actors_movies
            JOIN movies ON actors_movies.movieid = movies.movieid
            JOIN actors ON actors_movies.actorid = actors.actorid";

    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "</tr>";
    }
}
?>

</table>

<?php include('inclassexample/includes/foot.inc.php'); ?>
