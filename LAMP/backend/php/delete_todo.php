<?php
session_start();
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

$todo_id = $_POST['todo_id'];

// Delete the task
$stmt = $mysqli->prepare('DELETE FROM todos WHERE id = ? AND user_id = ?');
$stmt->bind_param('ii', $todo_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo 'Task deleted successfully!';
} else {
    echo 'Error: ' . $mysqli->error;
}
?>
