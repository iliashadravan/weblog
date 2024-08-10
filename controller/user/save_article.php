<?php
global $db;
require_once '../../controller/db.php';
require_once '../../controller/functions.php';

session_start();  // اضافه کردن session_start() برای اطمینان از استفاده از $_SESSION

$errors = [];

if (!isset($_SESSION['email'])) {
    header('Location: /weblog/view/login.php');
    exit();
}

$email = $_SESSION['email'];

// بررسی نقش کاربر (آیا ادمین است یا خیر)
$sql = "SELECT * FROM `users` WHERE email='$email'";
$result = $db->query($sql);
$user = $result->fetch_assoc();

if ($user['is_admin'] == 1) {
    header('Location:/weblog/view/goback.html');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {     // POST is more secure than GET
    $title = request('title');
    $body = request('body');

    if (is_null($title)) {       // it means title == null
        $errors['title'] = 'title is empty';
    }
    if (is_null($body)) {
        $errors['body'] = 'body is empty';
    }

    $user_id = $user['id'];

    if (!is_null($title) && !is_null($body)) {

        date_default_timezone_set('Asia/Tehran');         // تنظیم ساعت بر تهران
        $time = date('Y-m-d H:i:s');       // قسمت ذخیره ساعت و تاریخ
        $SQL = "INSERT INTO `blog` (title, body, user_id, time) VALUES ('$title', '$body', '$user_id', '$time')";

        if ($result = mysqli_query($db, $SQL)) {
            $success = true;
        } else {
            echo 'error: ' . mysqli_error($db);
            exit;
        }

        header("Location: /weblog/view/user/index.php");
        exit();
    }
}
?>
