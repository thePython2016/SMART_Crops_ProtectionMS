<?php

$dbBootstrap = __DIR__ . '/../includes/db.php';
if (!is_file($dbBootstrap)) {
    $dbBootstrap = __DIR__ . '/includes/db.php';
}
require_once $dbBootstrap;
