<?php
$dbUrl = getenv('DATABASE_URL');
$params = parse_url($dbUrl);
$dsn = "pgsql:host={$params['host']};port={$params['port']};dbname=" . ltrim($params['path'], '/') . ";sslmode=require";

try {
    $conn = new PDO($dsn, $params['user'], $params['pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>