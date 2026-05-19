<?php

require_once __DIR__ . '/../includes/db.php';

$tests = [];

function assert_true($label, $condition, &$tests)
{
    $tests[] = [$label, (bool) $condition];
}

// Agro input
assert_true(
    'agroinputs insert',
    db_query(
        $conn,
        "INSERT INTO agroinputs(\"inputsNumber\", name, category, usage_) VALUES ('INP001', 'Urea', 'Fertilizer', 'Top dressing')"
    ) !== false,
    $tests
);

// Agro officer
assert_true(
    'agroofficers insert',
    db_query(
        $conn,
        "INSERT INTO agroofficers(\"mobileNumber\", occupation, fname, mname, lname, gender, \"birthDay\", \"birthMonth\", \"birthYear\", address)
         VALUES ('255700000002', 'Agronomist', 'Jane', 'A', 'Officer', 'Female', '5', '6', '1988', 'Arusha')"
    ) !== false,
    $tests
);

$inputs = db_query($conn, 'SELECT * FROM agroinputs');
assert_true('agroinputs select', db_num_rows($inputs) >= 1, $tests);

$officers = db_query($conn, 'SELECT * FROM agroofficers');
assert_true('agroofficers select', db_num_rows($officers) >= 1, $tests);

$region = db_query($conn, 'SELECT region, count("mobileNumber") as farmers FROM farmers GROUP BY region');
assert_true('farmers group by region', db_num_rows($region) >= 1, $tests);

$farmer = db_escape($conn, '255700000001');
$update = db_query(
    $conn,
    "UPDATE farmers SET region='Dodoma' WHERE \"mobileNumber\"='$farmer'"
);
assert_true('farmers update', $update !== false, $tests);

$failed = 0;
foreach ($tests as [$label, $ok]) {
    echo ($ok ? '[OK] ' : '[FAIL] ') . $label . PHP_EOL;
    if (!$ok) {
        $failed++;
        echo '  ' . pg_last_error($conn) . PHP_EOL;
    }
}

exit($failed > 0 ? 1 : 0);
