<?php
include 'config.php';

$sql = "SELECT name, message, created_at FROM guestbook ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
</head>
<body>

<h1>Guestbook</h1>

<form id="guestbook-form" action="submit.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required maxlength="100">

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Sign Guestbook</button>
</form>

<h2>Entries</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='entry'>";
        echo "<strong>" . htmlspecialchars($row['name']) . "</strong>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<small>" . $row['created_at'] . "</small>";
        echo "</div>";
    }
} else {
    echo "<p>No entries yet. Be the first to sign!</p>";
}

mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>