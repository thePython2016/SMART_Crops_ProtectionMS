<?php

require_once __DIR__ . '/../connection.php';

$queries = [
    'farmersCount' => 'SELECT count("mobileNumber") AS farmersCount FROM farmers',
    'inputsCount' => 'SELECT count("inputsNumber") AS inputsCount FROM agroinputs',
    'officersCount' => 'SELECT count("mobileNumber") AS officersCount FROM agroofficers',
];

foreach ($queries as $expected => $sql) {
    $result = db_query($conn, $sql);
    foreach ($result as $row) {
        echo $expected . ': ' . ($row[$expected] ?? 'MISSING') . PHP_EOL;
        echo '  keys: ' . implode(', ', array_keys($row)) . PHP_EOL;
    }
}
