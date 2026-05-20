<?php

declare(strict_types=1);

// Thin shim to the canonical flash helpers in the root includes directory.
$repoFlash = dirname(__DIR__) . '/includes/flash.php';

if (is_file($repoFlash)) {
    require_once $repoFlash;
} else {
    // Fallback for environments with different directory layouts; this will
    // still fail loudly if the canonical file cannot be found.
    require_once dirname(__DIR__, 2) . '/includes/flash.php';
}
