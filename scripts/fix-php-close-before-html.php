<?php

declare(strict_types=1);

$root = dirname(__DIR__);
foreach (['user', 'farmer', 'officers'] as $dir) {
    foreach (glob($root . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . '*.php') ?: [] as $path) {
        $content = file_get_contents($path);
        if ($content === false || !str_contains($content, 'auth_guard.php')) {
            continue;
        }
        $updated = preg_replace(
            "/(auth_guard\.php';)\R+<!DOCTYPE/",
            "$1\n?>\n<!DOCTYPE",
            $content,
            1,
            $n
        );
        if ($n > 0 && $updated !== $content) {
            file_put_contents($path, $updated);
            echo "Fixed: $path\n";
        }
    }
}
