<?php
session_start();
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

$user_id = $_SESSION['user_id']; // Get user ID from session
$task = $_POST['task'];

// Insert new task
$stmt = $mysqli->prepare('INSERT INTO todos (user_id, task) VALUES (?, ?)');
$stmt->bind_param('is', $user_id, $task);

if ($stmt->execute()) {
    echo 'Task added successfully!';
} else {
    echo 'Error: ' . $mysqli->error;
}
?>
