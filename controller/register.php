<?php


function request($field)
{
    return isset($_REQUEST[$field]) && $_REQUEST[$field] != "" ? trim($_REQUEST[$field]) : null;
}

function has_error($field)
{
    global $errors;
    return isset($errors[$field]);
}

function get_error($field)
{
    global $errors;
    return has_error($field) ? $errors[$field] : null;
}

$errors = [];
$show_errors = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $show_errors = true;

    $email = request('email');
    $password = request('password');
    $firstName = request('firstName');
    $lastName = request('lastName');
    $confirm_password = request('confirm_password');

    if (is_null($email)) {
        $errors['email'] = 'Email is empty';
    }

    if (is_null($password)) {
        $errors['password'] = 'Password is empty';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters long';
    }

    if (is_null($firstName)) {
        $errors['firstName'] = 'First name is empty';
    }

    if (is_null($lastName)) {
        $errors['lastName'] = 'Last name is empty';
    }

    if (is_null($confirm_password)) {
        $errors['confirm_password'] = 'Confirm password is empty';
    } elseif ($password != $confirm_password) {
        $errors['confirm_password'] = 'Confirm password does not match';
    }

    if (empty($errors)) {
        // Check for existing email in the database
        $link = mysqli_connect('localhost:3306', 'root', '', 'weblog');
        if (!$link) {
            echo 'Could not connect: ' . mysqli_connect_error();
            exit;
        }

        $email_query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($link, $email_query);

        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = 'This email is already in use';
        } else {
            // هش کردن پسورد
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $SQL = "INSERT INTO users (email, password, firstName, lastName) VALUES ('$email', '$hashed_password', '$firstName', '$lastName')";

            if (mysqli_query($link, $SQL)) {
                header("Location:/weblog/view/login.php");
                exit;
            } else {
                $errors['db'] = 'Database error: ' . mysqli_error($link);
            }
        }
    }
}
