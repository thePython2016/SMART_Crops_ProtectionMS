<?php
require_once __DIR__ . '/includes/auth_guard.php';
use PHPMailer\PHPMailer\Exception as MailException;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'connection.php';
require_once __DIR__ . '/includes/flash.php';
require_once dirname(__DIR__) . '/includes/pg_duplicate.php';
$mailSmtp = dirname(__DIR__, 2) . '/includes/mail_smtp.php';
if (is_file($mailSmtp)) {
    require_once $mailSmtp;
}

$sql = "select * from farmers where  email='$_POST[email]' OR '$_POST[email]'=''";
$res = db_query($conn, $sql);

if (isset($_POST['send'])) {
    if (db_num_rows($res) <= 0) {
        app_flash_error('No farmers found for that email selection.');
        echo "<script>window.location.href='e-message.php'</script>";
        exit;
    }

    try {
        $mail = crops2_create_mailer();

        while ($x = db_fetch_assoc($res)) {
            if (!empty($x['email'])) {
                $mail->addAddress($x['email']);
            }
        }

        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];
        $mail->send();

        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $sender = $_POST['sender'];
        $receiver = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $inserted = db_query($conn, "insert into message_sent(id,date,sender_name,receiver_name,subject,message)
            values('$id','$date','$sender','$receiver','$subject','$message')");
        if (!$inserted) {
            $err = db_last_error_message($conn);
            app_flash_from_pg_insert_error($err, [
                'id' => 'id',
            ], 'Message was sent but could not be saved to the log. Please try again.');
            echo "<script>window.location.href='e-message.php'</script>";
            exit;
        }

        app_flash_success('Your message has been sent successfully.');
        echo "<script>window.location.href='e-message.php'</script>";
    } catch (MailException $e) {
        app_flash_error('Email could not be sent. Check Gmail App Password in includes/mail_config.php. ' . $mail->ErrorInfo);
        echo "<script>window.location.href='e-message.php'</script>";
    } catch (Throwable $e) {
        app_flash_error('Email error: ' . $e->getMessage());
        echo "<script>window.location.href='e-message.php'</script>";
    }
}

?>
