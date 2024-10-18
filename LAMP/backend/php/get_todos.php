<?php
session_start();
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

$user_id = $_SESSION['user_id']; // Get user ID from session

// Fetch todos
$result = $mysqli->query("SELECT * FROM todos WHERE user_id = $user_id");

$todos = [];
while ($row = $result->fetch_assoc()) {
    $todos[] = $row;
}

echo json_encode($todos);
?>
