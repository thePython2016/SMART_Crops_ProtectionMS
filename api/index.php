<?php
// /user/api/index.php

// 1. Enable error reporting to help you debug during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Set JSON headers since this is behaving as an API endpoint
header('Content-Type: application/json');

// 3. Include the authentication script we fixed above
require_once __DIR__ . '/../includes/login_auth.php';

// 4. Establish connection to your Supabase PostgreSQL Database using Environment Variables
// Make sure these match what you set in your Vercel/Hosting Dashboard!
$db_url = getenv('DATABASE_URL'); 

if (!$db_url) {
    echo json_encode(['success' => false, 'error' => 'DATABASE_URL environment variable is missing.']);
    exit;
}

try {
    // Parse the PostgreSQL connection string
    $dbopts = parse_url($db_url);
    
    $host = $dbopts["host"];
    $port = $dbopts["port"] ?? 6543; // Default to connection pooler port
    $user = $dbopts["user"];
    $pass = $dbopts["pass"];
    $dbname = ltrim($dbopts["path"], '/');

    // Build Data Source Name (DSN) with Vercel's required SSL mode
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
    
    // Instantiate the PDO object configuration
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// 5. Handle the Login request if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Call the function from line 13 of your original stack trace
    $auth_result = app_handle_login($pdo);
    
    // Output the JSON response back to the client/frontend
    echo json_encode($auth_result);
    exit;
    
} else {
    echo json_encode(['success' => false, 'error' => 'Only POST requests are allowed on this endpoint.']);
}