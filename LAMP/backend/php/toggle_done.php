<?php
session_start();
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

$todo_id = $_POST['todo_id'];
$done = $_POST['done'] ? 1 : 0;

// Update the 'done' status of the task
$stmt = $mysqli->prepare('UPDATE todos SET done = ? WHERE id = ? AND user_id = ?');
$stmt->bind_param('iii', $done, $todo_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo 'Task updated successfully!';
} else {
    echo 'Error: ' . $mysqli->error;
}
?>
