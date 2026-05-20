<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$files = array_merge(
    [
        'includes/app.php',
        'includes/auth_guard.php',
        'includes/flash.php',
        'includes/form_flash.php',
        'api/router.php',
        'api/handler.php',
        'logout.php',
        'user/includes/app.php',
        'user/includes/auth_guard.php',
        'user/dashboardScripts.php',
        'farmer/auth_guard.php',
        'officer/auth_guard.php',
        'farmer/dashboardScripts.php',
        'officers/dashboardScripts.php',
    ],
    glob($root . '/user/*.php') ?: [],
    glob($root . '/farmer/*.php') ?: [],
    glob($root . '/officers/*.php') ?: []
);
$files = array_unique(array_filter(array_map(static function ($f) use ($root) {
  if (str_contains($f, 'PHPMailer')) {
      return null;
  }
  return is_file($f) ? $f : (is_file($root . '/' . $f) ? $root . '/' . $f : null);
}, $files)));

$failed = 0;
foreach ($files as $path) {
    passthru('"' . PHP_BINARY . '" -l ' . escapeshellarg($path), $code);
    if ($code !== 0) {
        $failed++;
    }
}
exit($failed > 0 ? 1 : 0);
