<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin'){
    header('Location: admin-dashboard.php');
    exit();
}
