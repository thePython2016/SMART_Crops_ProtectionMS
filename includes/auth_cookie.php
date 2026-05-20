<?php

declare(strict_types=1);

if (function_exists('app_cookie_secure')) {
    return;
}

function app_cookie_secure(): bool
{
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
}

/** Signing key for the stateless auth cookie (Vercel serverless has no shared PHP session files). */
function app_auth_secret(): string
{
    static $secret = null;
    if ($secret !== null) {
        return $secret;
    }

    foreach (['AUTH_SECRET', 'VERCEL_AUTOMATION_BYPASS_SECRET'] as $key) {
        $value = getenv($key);
        if (is_string($value) && $value !== '') {
            $secret = $value;
            return $secret;
        }
    }

    foreach (['DATABASE_URL', 'POSTGRES_URL'] as $key) {
        $value = getenv($key);
        if (is_string($value) && $value !== '') {
            $secret = hash('sha256', $value);
            return $secret;
        }
    }

    $secret = 'crops-local-dev-auth';
    return $secret;
}

function app_restore_auth_from_cookie(): void
{
    if (isset($_SESSION['username'])) {
        return;
    }

    $raw = (string) ($_COOKIE['crops_auth'] ?? '');
    if ($raw === '' || !str_contains($raw, '.')) {
        return;
    }

    [$payloadB64, $sig] = explode('.', $raw, 2);
    $expected = hash_hmac('sha256', $payloadB64, app_auth_secret());
    if (!hash_equals($expected, $sig)) {
        return;
    }

    $json = base64_decode(strtr($payloadB64, '-_', '+/') . str_repeat('=', (4 - strlen($payloadB64) % 4) % 4), true);
    if ($json === false) {
        return;
    }

    $data = json_decode($json, true);
    if (
        !is_array($data)
        || empty($data['username'])
        || !isset($data['level'])
        || (int) ($data['exp'] ?? 0) < time()
    ) {
        return;
    }

    $_SESSION['username'] = (string) $data['username'];
    $_SESSION['level'] = (int) $data['level'];
}

/** Persist login across Vercel lambdas (signed cookie) and local XAMPP (PHP session). */
function app_set_auth_user(string $username, int $level): void
{
    app_session_start();
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $level;

    $payload = json_encode([
        'username' => $username,
        'level'    => $level,
        'exp'      => time() + 60 * 60 * 24 * 7,
    ], JSON_THROW_ON_ERROR);
    $payloadB64 = rtrim(strtr(base64_encode($payload), '+/', '-_'), '=');
    $sig = hash_hmac('sha256', $payloadB64, app_auth_secret());
    $value = $payloadB64 . '.' . $sig;
    $expires = time() + 60 * 60 * 24 * 7;

    setcookie('crops_auth', $value, [
        'expires'  => $expires,
        'path'     => '/',
        'secure'   => app_cookie_secure(),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    $_COOKIE['crops_auth'] = $value;
}

function app_clear_auth_user(): void
{
    app_session_start();
    unset($_SESSION['username'], $_SESSION['level']);
    $_SESSION = [];
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }

    setcookie('crops_auth', '', [
        'expires'  => time() - 3600,
        'path'     => '/',
        'secure'   => app_cookie_secure(),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    unset($_COOKIE['crops_auth']);
}
