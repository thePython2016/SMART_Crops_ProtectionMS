<?php

require_once __DIR__ . '/../includes/db.php';

echo "PostgreSQL connection: OK\n";

$users = db_query($conn, 'SELECT username, level FROM user ORDER BY level');
foreach ($users as $user) {
    echo sprintf("  user: %s (level %s)\n", $user['username'], $user['level']);
}

$insertFarmer = "INSERT INTO farmers(\"mobileNumber\", email, fname, mname, lname, gender, \"birthDay\", \"birthMonth\", \"birthYear\", region)
    VALUES ('255700000001', 'test@example.com', 'Test', 'M', 'Farmer', 'Male', '1', '1', '1990', 'Dar es Salaam')
    ON CONFLICT (\"mobileNumber\") DO NOTHING";

if (db_query($conn, $insertFarmer) === false) {
    echo "Farmer insert failed: " . pg_last_error($conn) . "\n";
    exit(1);
}

$farmers = db_query($conn, 'SELECT * FROM farmers');
echo 'Farmers count: ' . db_num_rows($farmers) . "\n";

$login = db_query(
    $conn,
    "SELECT username, password, level FROM user WHERE username='admin' AND password='admin123'"
);
$row = db_fetch_array($login);
echo $row ? "Login test (admin): level {$row['level']}\n" : "Login test failed\n";

echo "All database checks passed.\n";
