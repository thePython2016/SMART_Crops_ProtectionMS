<?php
function app_login_credentials(): array
{
    if (isset($_POST['username'])) {
        return [trim((string) $_POST['username']), (string) ($_POST['password'] ?? '')];
    }

    $raw = file_get_contents('php://input');
    if ($raw === false || $raw === '') {
        return ['', ''];
    }

    $data = json_decode($raw, true);
    if (!is_array($data)) {
        return ['', ''];
    }

    return [trim((string) ($data['username'] ?? '')), (string) ($data['password'] ?? '')];
}

function app_handle_login(PDO $pdo): array
{
    [$username, $password] = app_login_credentials();

    if ($username === '' || $password === '') {
        return ['success' => false, 'message' => 'Username and password are required.'];
    }

    $stmt = $pdo->prepare('SELECT username, password, level FROM "user" WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || $user['password'] !== $password) {
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }

    app_set_auth_user($user['username'], (int) $user['level']);

    return [
        'success'  => true,
        'message'  => 'Login successful.',
        'username' => $user['username'],
        'level'    => (int) $user['level'],
    ];
}
