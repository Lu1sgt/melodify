<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        die('All fields are required.');
    }

    $conn = new mysqli('localhost', 'root', '', 'melodify');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $id; 
            $conn->close();
            header("Location: dashboard.html"); 
            exit();
        } else {
            $conn->close();
            die('Invalid password.');
        }
    } else {
        $conn->close();
        die('No user found with this email.');
    }
}
