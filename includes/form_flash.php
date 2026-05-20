<?php

declare(strict_types=1);

/**
 * Show success/error messages at the top of a form (reads then clears session flash keys).
 */
function render_form_flash(): void
{
    if (!function_exists('app_session_start')) {
        require_once __DIR__ . '/app.php';
    }
    app_session_start();

    $messages = [
        ['form_success', 'success'],
        ['addedFarmer', 'success'],
        ['message', 'success'],
        ['sent', 'success'],
        ['messageStudent', 'success'],
        ['form_error', 'danger'],
        ['addingFarmerError', 'danger'],
    ];

    $shown = false;

    foreach ($messages as [$key, $type]) {
        if (empty($_SESSION[$key])) {
            continue;
        }

        $text = trim(strip_tags((string) $_SESSION[$key]));
        unset($_SESSION[$key]);

        if ($text === '') {
            continue;
        }

        $shown = true;
        $class = $type === 'success' ? 'alert-success' : 'alert-danger';
        echo '<div class="alert ' . $class . ' alert-dismissible fade show form-flash mb-3" role="alert">';
        echo htmlspecialchars($text);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }

    if ($shown) {
        echo '<style>.form-flash{width:100%;max-width:100%;margin:0 0 1rem 0;font-weight:600;}</style>';
    }
}

/**
 * Inline alert directly above a specific form control (name="" must match $fieldName).
 * Clears that key from the session when rendered.
 */
function render_form_field_flash(string $fieldName): void
{
    if (!function_exists('app_session_start')) {
        require_once __DIR__ . '/app.php';
    }
    app_session_start();

    if (empty($_SESSION['form_field_errors']) || !is_array($_SESSION['form_field_errors'])) {
        return;
    }

    $errors = $_SESSION['form_field_errors'];
    if (empty($errors[$fieldName])) {
        return;
    }

    $text = trim(strip_tags((string) $errors[$fieldName]));
    unset($_SESSION['form_field_errors'][$fieldName]);

    if ($text === '') {
        if ($_SESSION['form_field_errors'] === []) {
            unset($_SESSION['form_field_errors']);
        }
        return;
    }

    echo '<div class="alert alert-danger alert-dismissible fade show form-field-flash mb-2" role="alert">';
    echo htmlspecialchars($text);
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    echo '</div>';

    if ($_SESSION['form_field_errors'] === []) {
        unset($_SESSION['form_field_errors']);
    }
}
