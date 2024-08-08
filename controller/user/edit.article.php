<?php

global $db;
require_once 'db.php'; // مسیر صحیح به db.php

if (!isset($_GET['id'])) {
    header('Location:/weblog/view/articles_after.login.php');
    exit;
}

$post_id = intval($_GET['id']); // تبدیل به عدد صحیح برای جلوگیری از SQL Injection

// دریافت اطلاعات مقاله
$sql = "SELECT * FROM blog WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('i', $post_id);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    // به روز رسانی مقاله
    $sql = "UPDATE blog SET title = ?, body = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssi', $title, $body, $post_id);

    if ($stmt->execute()) {
        header('Location:/weblog/view/admin/list_users.admin.php');
        exit;
    } else {

        echo "Error updating article: " . $stmt->error;
    }
}
//mghmkd