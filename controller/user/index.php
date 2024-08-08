<?php

global $db;
require_once '../../controller/db.php';
require_once '../../controller/auth.php';

// گرفتن اطلاعات کاربر
$sql = "SELECT * FROM `users` WHERE email='{$_SESSION['email']}'";
$result = $db->query($sql);
$user = $result->fetch_assoc();


// گرفتن مقالات کاربر
$sql_blog = "SELECT * FROM `blog` WHERE user_id='{$user['id']}'";
$result_blog = $db->query($sql_blog);

// بررسی اگر کاربر مدیر است
if ($user['is_admin'] != 0) {
    header('Location: /weblog/view/goback.html');
    exit;
}

// گرفتن تمام کاربران عادی (is_admin = 0) به جز خود ادمین
$sql_all_users = "SELECT * FROM users WHERE is_admin = 1";
$all_users_result = $db->query($sql_all_users);

