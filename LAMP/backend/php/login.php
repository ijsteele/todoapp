<?php
// DB connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $mysqli->prepare('SELECT id, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $id;  // Store the user ID in session
            echo 'Login successful!';
        } else {
            echo 'Invalid password.';
        }
    } else {
        echo 'User not found.';
    }
}
?>
