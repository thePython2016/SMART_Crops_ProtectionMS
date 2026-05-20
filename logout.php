<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/app.php';
app_clear_auth_user();
app_redirect_login();

