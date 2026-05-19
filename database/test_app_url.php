<?php

require_once __DIR__ . '/../includes/app.php';

$_SERVER['SCRIPT_NAME'] = '/crops2/index.php';
echo "from /crops2/index.php => " . app_url('user/user.php') . PHP_EOL;

$_SERVER['SCRIPT_NAME'] = '/crops2/api/index.php';
echo "from /crops2/api/index.php => " . app_url('user/user.php') . PHP_EOL;
