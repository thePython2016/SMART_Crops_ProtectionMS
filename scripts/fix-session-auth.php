<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$replacements = [
    'user' => '<?php' . "\n" . "require_once __DIR__ . '/includes/auth_guard.php';" . "\n",
    'farmer' => '<?php' . "\n" . "require_once __DIR__ . '/auth_guard.php';" . "\n",
    'officers' => '<?php' . "\n" . "require_once __DIR__ . '/auth_guard.php';" . "\n",
];

foreach ($replacements as $dir => $header) {
    $dirPath = $root . DIRECTORY_SEPARATOR . $dir;
    foreach (glob($dirPath . DIRECTORY_SEPARATOR . '*.php') ?: [] as $path) {
        $name = basename($path);
        if (in_array($name, ['dashboardScripts.php', 'auth_guard.php'], true)) {
            continue;
        }
        if (str_contains($path, 'PHPMailer')) {
            continue;
        }

        $content = file_get_contents($path);
        if ($content === false || !str_contains($content, 'session_start(')) {
            continue;
        }
        if (str_contains($content, 'auth_guard.php')) {
            continue;
        }

        $content = preg_replace('/^\xEF\xBB\xBF/', '', $content) ?? $content;
        $updated = $content;

        $updated = preg_replace(
            '/^\s*<\?php\s*\R+\s*session_start\s*\(\s*\)\s*;\s*\R+if\s*\(\s*!isset\s*\(\s*\$_SESSION\s*\[\s*[\'"]username[\'"]\s*\]\s*\)\s*\)\s*\{.*?\}\s*\R+\?>\s*\R*/s',
            $header,
            $updated,
            1,
            $countBlock
        );

        if (($countBlock ?? 0) === 0) {
            $updated = preg_replace(
                '/^\s*<\?php\s*\R+\s*session_start\s*\(\s*\)\s*;\s*\R*/s',
                $header,
                $updated,
                1
            );
        }

        $updated = preg_replace('/^\s*<\?php\s*\R+\?>\s*\R*/', '', $updated, 1);

        if ($updated === $content) {
            fwrite(STDERR, "No change: $path\n");
            continue;
        }

        if (preg_match('/session_start\s*\(/', $updated)) {
            fwrite(STDERR, "Still has session_start: $path\n");
        }

        file_put_contents($path, $updated);
        echo "Updated: $path\n";
    }
}

// Restore auth on pages stripped earlier (no session_start left, no auth_guard).
$restore = [
    'user/weather.php',
    'user/farmers-region.php',
    'farmer/weather.php',
    'farmer/farmers-region.php',
    'officers/weather.php',
    'officers/farmers-region.php',
];
foreach ($restore as $rel) {
    $path = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $rel);
    if (!is_file($path)) {
        continue;
    }
    $content = file_get_contents($path);
    if ($content === false || str_contains($content, 'auth_guard.php')) {
        continue;
    }
    if (!str_starts_with(ltrim($content), '<!DOCTYPE')) {
        continue;
    }
    $dir = explode('/', $rel)[0];
    $header = $replacements[$dir] ?? null;
    if ($header === null) {
        continue;
    }
    file_put_contents($path, $header . ltrim($content));
    echo "Restored auth: $path\n";
}
