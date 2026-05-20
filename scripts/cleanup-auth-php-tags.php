<?php

declare(strict_types=1);

$root = dirname(__DIR__);
foreach (['user', 'farmer', 'officers'] as $dir) {
    foreach (glob($root . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . '*.php') ?: [] as $path) {
        $content = file_get_contents($path);
        if ($content === false) {
            continue;
        }
        $updated = preg_replace(
            "/(auth_guard\.php';)\R+<\?php\R+\?>\R+/",
            "$1\n",
            $content
        );
        $updated = preg_replace(
            "/(auth_guard\.php';)\R+<!DOCTYPE/",
            "$1\n<!DOCTYPE",
            $updated
        );
        if ($updated !== $content) {
            file_put_contents($path, $updated);
            echo "Cleaned: $path\n";
        }
    }
}
