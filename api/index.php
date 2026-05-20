<?php
header('Content-Type: application/json');
ini_set('display_errors', 0); // Turned off to prevent HTML warnings from breaking your JSON response

require_once __DIR__ . '/../includes/login_auth.php';

$db_url = getenv('DATABASE_URL'); 
if (!$db_url) {
    echo json_encode(['success' => false, 'error' => 'DATABASE_URL environment variable is missing.']);
    exit;
}

try {
    $dbopts = parse_url($db_url);
    $host = $dbopts["host"];
    $port = $dbopts["port"] ?? 6543;
    $user = $dbopts["user"];
    $pass = $dbopts["pass"];
    $dbname = ltrim($dbopts["path"], '/');

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed.']);
    exit;
}

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth_result = app_handle_login($pdo);
    echo json_encode($auth_result);
    exit;
}

// Fallback response for normal browser visits (GET requests)
echo json_encode([
    'success' => false, 
    'message' => 'API endpoint is live! Please send a POST request with your login credentials to authenticate.'
]);