<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $inputPassword = trim($_POST['password']); // renamed for clarity

    if (empty($email) || empty($inputPassword)) {
        die('All fields are required.');
    }

    $conn = new mysqli('localhost', 'root', '', 'melodify');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // hardcoded muna
    if ($email == 'admin@gmail.com' && $inputPassword == 'admin') {
        $_SESSION['userType'] = 'admin';
        header("Location: admin.html");
        exit();
    }

    $stmt = $conn->prepare('SELECT id, password, username FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $dbPassword, $username);
        $stmt->fetch();

        // plaintext muna
        if ($inputPassword === $dbPassword) {
            // dito ko na iset username variables @diego
            $_SESSION['user_id'] = $id;
            $_SESSION['role'] = "user";
            $_SESSION['username'] = $username;
            $conn->close();
            header("Location: index.php");
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
