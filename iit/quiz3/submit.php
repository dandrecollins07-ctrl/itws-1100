<?php

// Block direct access (must be POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: guestbook.php");
    exit();
}

include __DIR__ . '/config.php';

$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($message)) {
    echo "error";
    exit();
}

$stmt = $conn->prepare("INSERT INTO guestbook (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);
$stmt->execute();

$stmt->close();
$conn->close();

echo "success";
exit();

?>