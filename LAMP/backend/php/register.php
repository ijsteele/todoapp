<?php
// DB connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert user into the database
    $stmt = $mysqli->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $name, $email, $password);
    
    if ($stmt->execute()) {
        echo 'Registration successful!';
    } else {
        echo 'Error: ' . $mysqli->error;
    }
}
?>
