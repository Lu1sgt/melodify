<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "melodify";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' OR username='$email'";
$result = $conn->query($sql);
$stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR username=?");
$stmt->bind_param("ss", $email, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['last_activity'] = time(); 

        $username = urlencode($user['username']);
        header("Location: home.php?user=$username");
        exit();
    } else {
        echo "Invalid password. <a href='login.html'>Try again</a>";
    }
} else {
    echo "User not found. <a href='signup.html'>Sign up here</a>";
}

$stmt->close();
$conn->close();
?>