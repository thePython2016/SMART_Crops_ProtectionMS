<?php
ob_start();
require_once __DIR__ . '/../includes/app.php';
app_session_start();
require_once __DIR__ . '/../includes/login_auth.php';

$db_url = getenv('DATABASE_URL');
if (!$db_url) {
    app_json_response(['success' => false, 'error' => 'DATABASE_URL environment variable is missing.']);
}

try {
    $dbopts = parse_url($db_url);
    $host = $dbopts['host'];
    $port = $dbopts['port'] ?? 6543;
    $user = $dbopts['user'];
    $pass = $dbopts['pass'];
    $dbname = ltrim($dbopts['path'], '/');
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    app_json_response(['success' => false, 'error' => 'Database connection failed.']);
}

$login_error = '';
$is_form_login = $_SERVER['REQUEST_METHOD'] === 'POST'
    && (isset($_POST['login']) || isset($_POST['username']));
$is_json_login = $_SERVER['REQUEST_METHOD'] === 'POST' && !$is_form_login;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['username'])) {
    app_redirect(app_dashboard_path((int) ($_SESSION['level'] ?? 1)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth_result = app_handle_login($pdo);

    if ($is_json_login) {
        app_json_response($auth_result);
    }

    if ($auth_result['success']) {
        app_redirect(app_dashboard_path($auth_result['level']));
    }

    $login_error = $auth_result['message'] ?? 'Invalid username or password. Please try again.';
}

app_discard_output_buffers();
$login_action = app_login_action();
require __DIR__ . '/../includes/login_page.php';
