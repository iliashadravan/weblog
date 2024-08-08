<?php
global $db;
require_once __DIR__ . '/../db.php'; // اصلاح مسیر به درستی
require_once __DIR__ . '/../auth.php'; // اصلاح مسیر به درستی


// Check if 'id' is set in the GET parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $db->prepare("SELECT * FROM `users` WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $stmt_blog = $db->prepare("SELECT * FROM `blog` WHERE user_id = ?");
        $stmt_blog->bind_param("i", $user['id']);
        $stmt_blog->execute();
        $result_blog = $stmt_blog->get_result();
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>




