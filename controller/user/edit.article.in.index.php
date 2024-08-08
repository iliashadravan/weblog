<?php

global $db;
require_once 'db.php'; // مسیر صحیح به db.php
if (!isset($_GET['id'])) {
    header('Location:/weblog/view/index.php');
    exit;
}
$post_id = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id='$post_id'";
$result = $db->query($sql);
$blog = $result->fetch_assoc();
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $sql = "UPDATE blog SET title='$title', body='$body' WHERE id=$post_id";
    $result = $db->query($sql);
    header('Location:/weblog/view/index.php');
    exit;
}

