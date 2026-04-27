<?php
include('includes/init.inc.php');
include('includes/functions.inc.php');
?>
<title>Actors &amp; Movies - ITWS</title>

<?php include('includes/head.inc.php'); ?>

<h1>PHP &amp; MySQL</h1>

<?php include('includes/menubody.inc.php'); ?>

<?php
$dbOk = false;
include('config.php');
@$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
    $dbOk = true;
}
?>

<h3>Movies and their Actors</h3>
<table id="actorTable">
<?php
if ($dbOk) {
    $sql = "SELECT movies.title, movies.year, actors.firstname, actors.lastname
            FROM actors_movies
            JOIN movies ON actors_movies.movieid = movies.movieid
            JOIN actors ON actors_movies.actorid = actors.actorid
            ORDER BY movies.title";

    $result = $db->query($sql);
    $numRecords = $result->num_rows;

    echo '<tr><th>Movie</th><th>Year</th><th>Actor</th></tr>';
    for ($i = 0; $i < $numRecords; $i++) {
        $record = $result->fetch_assoc();
        if ($i % 2 == 0) {
            echo '<tr>';
        } else {
            echo '<tr class="odd">';
        }
        echo '<td>' . htmlspecialchars($record['title']) . '</td>';
        echo '<td>' . htmlspecialchars($record['year']) . '</td>';
        echo '<td>' . htmlspecialchars($record['lastname']) . ', ' . htmlspecialchars($record['firstname']) . '</td>';
        echo '</tr>';
    }

    $result->free();
    $db->close();
}
?>
</table>

<?php include('includes/foot.inc.php'); ?>