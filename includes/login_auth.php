<?php

/**
 * Handle login POST. Returns true when a redirect was sent.
 */
function app_handle_login($conn): bool
{
    if (!isset($_POST['login'])) {
        return false;
    }

    $username = db_escape($conn, $_POST['username'] ?? '');
    $pass = db_escape($conn, $_POST['password'] ?? '');

    $select = "SELECT username, password, level FROM user WHERE username='$username' AND password='$pass'";
    $answer = db_query($conn, $select);
    $row = db_fetch_array($answer);

    if (!$row) {
        return false;
    }

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $_SESSION['username'] = $username;
    $level = (int) $row['level'];

    if ($level === 1) {
        app_redirect('user/user.php');
    }
    if ($level === 2) {
        app_redirect('farmer/user.php');
    }
    if ($level === 3) {
        app_redirect('officers/user.php');
    }

    return false;
}
