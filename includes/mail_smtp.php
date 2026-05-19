<?php

use PHPMailer\PHPMailer\PHPMailer;

/**
 * @return array<string, mixed>
 */
function crops2_mail_config()
{
    $path = __DIR__ . '/mail_config.php';
    if (!is_readable($path)) {
        throw new RuntimeException(
            'Missing mail_config.php. Copy includes/mail_config.example.php to includes/mail_config.php and set your Gmail App Password.'
        );
    }
    return require $path;
}

function crops2_create_mailer()
{
    $config = crops2_mail_config();
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $config['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['username'];
    $mail->Password = str_replace(' ', '', (string) $config['password']);
    $mail->CharSet = PHPMailer::CHARSET_UTF8;

    $encryption = strtolower((string) ($config['encryption'] ?? 'smtps'));
    if ($encryption === 'tls' || $encryption === 'starttls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = (int) ($config['port'] ?? 587);
    } else {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = (int) ($config['port'] ?? 465);
    }

    $mail->setFrom(
        $config['from_email'] ?? $config['username'],
        $config['from_name'] ?? ''
    );

    return $mail;
}
