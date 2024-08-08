<?php

require_once __DIR__ . '/../db.php'; // اصلاح مسیر به درستی
require_once __DIR__ . '/../auth.php'; // اصلاح مسیر به درستی
global $db;

if (!isset($_SESSION['email'])) {
    header('Location: /weblog/view/login.php');
    exit;
}

$user_email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$user_email'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

if ($user['is_admin'] != 1) {
    header('Location: /weblog/view/goback.html');
    exit;
}

// دریافت تمام کاربران عادی (is_admin = 0) به جز خود ادمین
$sql_all_users = "SELECT * FROM users WHERE is_admin = 0";
$all_users_result = $db->query($sql_all_users);

if ($all_users_result === false) {
    die("Error: " . $db->error);
}
?>
