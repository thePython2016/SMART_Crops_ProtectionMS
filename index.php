<?php ob_start();
/**
 * Local XAMPP login (optional). Vercel uses /api/index.php as the entry point.
 */
require_once __DIR__ . '/includes/app.php';
app_session_start();
require_once __DIR__ . '/includes/login_auth.php';
require_once __DIR__ . '/connection.php';

$login_error = '';

if (isset($_POST['login'])) {
    $auth_result = app_handle_login($conn);
    if ($auth_result['success']) {
        app_redirect(app_dashboard_path((int) $auth_result['level']));
    }
    $login_error = $auth_result['message'] ?? 'Invalid username or password. Please try again.';
}

app_discard_output_buffers();
$login_action = app_login_action();
require __DIR__ . '/includes/login_page.php';
