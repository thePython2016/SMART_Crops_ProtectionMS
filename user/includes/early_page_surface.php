<?php

declare(strict_types=1);

/**
 * Critical inline styles: match Sneat core --bs-body-bg (#f5f5f9) before external CSS loads
 * to reduce white flash on first paint.
 */
if (defined('CROPS_EARLY_SURFACE_EMITTED')) {
    return;
}

define('CROPS_EARLY_SURFACE_EMITTED', true);

echo '<style id="crops-early-surface">html,body{min-height:100vh;background-color:#f5f5f9!important;}</style>';
