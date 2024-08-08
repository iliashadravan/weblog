<?php

global $db, $db, $db;
require_once 'db.php';
require_once 'auth.php';

$email = $_SESSION['email'];
$success_message = '';
$error_message = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['email'] ?? '';
    $new_password = $_POST['password'] ?? '';
    $new_firstname = $_POST['firstname'] ?? '';
    $new_lastname = $_POST['lastname'] ?? '';

    // Validate new email to avoid SQL injection
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "email is not valid";
    } else {
        // Prepare SQL statement based on whether password is provided
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET email = ?, password = ?, firstname = ?, lastname = ? WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('sssss', $new_email, $hashed_password, $new_firstname, $new_lastname, $email);
        } else {
            $sql = "UPDATE users SET email = ?, firstname = ?, lastname = ? WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->bind_param('ssss', $new_email, $new_firstname, $new_lastname, $email);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['email'] = $new_email;
            $success_message = "User information updated successfully.";
        } else {
            $error_message = "User information update failed.";
        }
    }
}

// Fetch user information after updating
$email = $_SESSION['email']; // Update email variable to reflect any changes
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Default values to avoid null access errors
$user_firstname = $user['firstname'] ?? '';
$user_lastname = $user['lastname'] ?? '';
$user_email = $user['email'] ?? '';
