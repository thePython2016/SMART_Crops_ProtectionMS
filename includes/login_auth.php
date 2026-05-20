<?php
function app_handle_login($pdo): array
{
    $data = json_decode(file_get_contents('php://input'), true);

    $username = trim($data['username'] ?? '');
    $password = trim($data['password'] ?? '');

    if (!$username || !$password) {
        return ['success' => false, 'message' => 'Username and password are required.'];
    }

    $stmt = $pdo->prepare("SELECT username, password, level FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user || $user['password'] !== $password) {
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }

    return [
        'success'  => true,
        'message'  => 'Login successful.',
        'username' => $user['username'],
        'level'    => (int) $user['level']
    ];
}