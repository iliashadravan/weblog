<?php
global $db;
require_once '../../controller/db.php';
require_once '../../controller/functions.php';


$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST') {     // POST is secretary than GET
    $title = request('title');
    $body = request('body');

    if (is_null($title)) {       // it means title == null
        $errors['title'] = 'title is empty';
    }
    if (is_null($body)) {
        $errors['body'] = 'body is empty';
    }
    $sql="SELECT * FROM `users` WHERE email='{$_SESSION['email']}'";
    $result=$db->query($sql);
    $user = $result -> fetch_assoc();
    $user_id = $user['id'];
    if (!is_null($title) && !is_null($body)) {

        date_default_timezone_set('Asia/Tehran');         // تنظیم ساعت بر تهران
        $time=date('Y-m-d H:i:s');       // قسمت ذخیره ساعت و تاریخ
        $SQL = "insert into `blog` (title, body,user_id,time) values ('$title', '$body','$user_id' ,'$time') ";
        if ($result = mysqli_query($db, $SQL)) {
            $success = true;
        } else {
            echo 'error: ' . mysqli_error($db);
            exit;
        }
        header("location:/weblog/view/user/index.php");
    }
}

?>