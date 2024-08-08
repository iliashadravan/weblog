<?php

require_once __DIR__ . '/../db.php'; // مسیر صحیح
require_once __DIR__ . '/../auth.php'; // مسیر صحیح

if (!isset($_GET['id'])) {
    header("Location: /weblog/view/admin/list_users.php");
    exit();
}

$link = mysqli_connect('localhost', 'root', '', 'weblog');
if (!$link) {
    echo 'Could not connect: ' . mysqli_connect_error();
    exit();
}

$stmt = mysqli_prepare($link, "SELECT * FROM users WHERE id = ?");
$id = (int)$_GET['id'];
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result->num_rows == 0) {
    header("Location: /weblog/view/admin/list_users.php");
    exit();
}

$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !is_null($user)) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    $stmt = mysqli_prepare($link, "UPDATE users SET email = ?, password = ?, firstname = ?, lastname = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'ssssi', $email, $password, $firstname, $lastname, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($link)) {
        header("Location: ../../view/admin/list_users.admin.php");
        exit();
    } else {
        echo "خطا در به‌روزرسانی کاربر.";
    }
}
