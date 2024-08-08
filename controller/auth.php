<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // کاربر قبلاً وارد شده است
    // اینجا نیازی به هیچ اقدامی نیست، چون پیام خطا در login.php مدیریت می‌شود
} else {
    // کاربر وارد نشده است، هدایت به صفحه ورود
    header('Location: /weblog/view/login.php');
    exit();
}
//comment
?>
