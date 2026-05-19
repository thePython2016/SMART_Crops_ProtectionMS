<?php
/**
 * Copy to mail_config.php and set your Gmail App Password.
 * https://myaccount.google.com/apppasswords (requires 2-Step Verification)
 */
return [
    'host'       => 'smtp.gmail.com',
    'username'   => 'your@gmail.com',
    'password'   => 'your-16-char-app-password',
    'from_email' => 'your@gmail.com',
    'from_name'  => 'Crops2',
    // Use 'smtps' + port 465, or 'tls' + port 587
    'encryption' => 'smtps',
    'port'       => 465,
];
