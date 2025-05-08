<?php
session_start();

if (!isset($_POST['csrf_token'])){
    die("CRSF token is missing.");
}

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "melodify";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

if (strlen($password) < 8) {
    die("Password must be at least 8 characters long.");
}

$hashed_password = password_hash($password, PASSWORD_ARGON2ID);

$stmt = $conn->prepare("SELECT id FROM users WHERE email=? OR username=?");
$stmt->bind_param("ss", $email, $username);
$stmt->execute();
$result = $stmt->get_result();

if($stmt->num_rows > 0){
    die("Email or username already exists. <a href='signup.html'>Try again</a>");
}
$stmt->close();

$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $username, $hashed_password);

if ($stmt->execute()) {
    session_regenerate_id(true); 

    echo "Signup successful! <a href='login.html'>Log in here</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>