<?php
function request($field) {
    return isset($_REQUEST[$field]) && $_REQUEST[$field] != "" ? trim($_REQUEST[$field]) : null;
}

function has_error($field) {
    global $errors;                     //error در سایت وجود دارد

    return isset($errors[$field]);
}

function get_error($field) {
    global $errors;                   // error را به ما برگردانید

    return has_error($field) ? $errors[$field] : null;
}
?>