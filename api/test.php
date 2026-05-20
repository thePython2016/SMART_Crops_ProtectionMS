<?php
$dbUrl = getenv('DATABASE_URL');

if (!$dbUrl) {
    die("❌ DATABASE_URL is not set!");
}

echo "✅ DATABASE_URL found<br>";

$params = parse_url($dbUrl);

echo "Host: " . $params['host'] . "<br>";
echo "Port: " . $params['port'] . "<br>";
echo "User: " . $params['user'] . "<br>";
echo "DB: " . ltrim($params['path'], '/') . "<br>";

$dsn = "pgsql:host={$params['host']};port={$params['port']};dbname=" . ltrim($params['path'], '/') . ";sslmode=require";

try {
    $conn = new PDO($dsn, $params['user'], $params['pass']);
    echo "✅ Connected to Supabase successfully!";
} catch (PDOException $e) {
    die("❌ Error: " . $e->getMessage());
}
?>