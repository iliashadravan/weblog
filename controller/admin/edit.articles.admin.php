<?php
global $db;
require_once __DIR__ . '/../../controller/db.php';

// بررسی وجود `id` در URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID is missing.";
    exit;
}

// تبدیل `id` به عدد صحیح
$post_id = intval($_GET['id']);

// دریافت اطلاعات مقاله
$sql = "SELECT * FROM blog WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('i', $post_id);
$stmt->execute();
$result = $stmt->get_result();

// بررسی وجود مقاله
if ($result->num_rows === 0) {
    echo "Article not found.";
    exit;
}

$blog = $result->fetch_assoc();

// اگر فرم ارسال شده است
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && isset($_POST['body'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    // بروزرسانی مقاله
    $sql = "UPDATE blog SET title = ?, body = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssi', $title, $body, $post_id);

    if ($stmt->execute()) {
        header('Location: ../../view/admin/list_users.admin.php');
        exit;
    } else {
        echo "Error updating article: " . $stmt->error;
    }
}
?>
