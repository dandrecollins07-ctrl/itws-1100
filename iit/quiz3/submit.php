<?php

include('config.php');

// Get form data
$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate
if (empty($name) || empty($message)) {
    die("Name and message are required.");
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO guestbook (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);
$stmt->execute();

// Close
$stmt->close();
$conn->close();

// Redirect back
header("Location: guestbook.php");
exit();

?>