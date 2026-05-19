<?php

$formFlash = __DIR__ . '/includes/form_flash.php';
if (!is_file($formFlash)) {
    $formFlash = __DIR__ . '/../includes/form_flash.php';
}
require_once $formFlash;
render_form_flash();
