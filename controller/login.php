<?php

global $db;
require_once 'db.php';


$errors = [
    'email' => '',
    'password' => '',
    'general' => ''
];
$success = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    // بررسی خالی بودن فیلدها
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    // اگر خطاها خالی نبودند، ادامه نمی‌دهیم
    if (empty(array_filter($errors))) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                if ($user['is_admin'] == 1) {
                    $errors['general'] = 'You are already logged in. If you want to logout, <a href="../view/admin/list_users.admin.php">click here</a>.';
                } else {
                    $errors['general'] = 'You are already logged in. If you want to logout, <a href="user/index.php">click here</a>.';
                }
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['is_admin'] = $user['is_admin'];
                $_SESSION['loggedin'] = true; // تنظیم نشانه ورود موفقیت‌آمیز

                if ($user['is_admin'] == 1) {
                    header('Location:/weblog/view/admin/list_users.admin.php');
                } else {
                    header('Location:/weblog/view/articles_after.login.php');
                }
                exit();
            }
        } else {
            $errors['password'] = 'Invalid password';
            $errors['email'] = 'Invalid email';
        }
    }

    $_SESSION['errors'] = $errors;
}

// بررسی خروج موفقیت‌آمیز
if (isset($_SESSION['logout_success']) && $_SESSION['logout_success'] === true) {
    $success[] = 'You have logged out successfully';
    unset($_SESSION['logout_success']); // پاک کردن پیام موفقیت‌آمیز خروج
}
