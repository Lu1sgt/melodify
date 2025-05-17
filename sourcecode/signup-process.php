<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $homePage = 'dashboard.html';

    if (empty($email) || empty($username) || empty($password)) {
        die('All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    if (strlen($password) < 8) {
        die('Password must be at least 8 characters long.');
    }

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli('localhost', 'root', '', 'melodify');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare('INSERT INTO users (email, username, password, home_page) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $email, $username, $password, $homePage);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header('Location: login.php');
        exit();
    } else {
        $stmt->close();
        $conn->close();
        die('Error: ' . $stmt->error);
    }
}
