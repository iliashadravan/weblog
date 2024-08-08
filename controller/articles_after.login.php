<?php

global $db;
require_once '../controller/db.php';
require_once '../controller/jdf.php';

if (!isset($_SESSION['email'])) {
    header('Location:/weblog/view/login.php');
    exit();
}

$email = $_SESSION['email'];

// استخراج تمامی مقالات از پایگاه داده
$sql = "SELECT blog.id, blog.title, blog.body, blog.time, users.firstname, users.lastname, users.email AS user_email 
        FROM blog 
        JOIN users ON blog.user_id = users.id";
$result = $db->query($sql);

if ($result === false) {
    die("Error: " . $db->error);
}

?>
