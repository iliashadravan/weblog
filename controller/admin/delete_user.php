<?php

global $db;
require_once __DIR__ . '/../../controller/db.php'; // مسیر به فایل اتصال به دیتابیس

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../../view/admin/list_users.admin.php");
        exit();
    } else {
        echo "Error: Could not delete user.";
    }
} else {
    echo "Invalid  user ID.";
}

