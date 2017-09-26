<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
$from = $_POST['email'];
$subject = $_POST['subject'];
$isi = $_POST['comments'];

try {
    //Server settings
    $mail->SMTPDebug = 2;                                   // Enable verbose debug output
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'mail.opsigo.com';                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'kresno.satrio@opsigo.com';           // SMTP username
    $mail->Password = 'pass8080word';                       // SMTP password
    $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom($from);
    $mail->addAddress('mail.opsigo.com');     // Add a recipient
    $mail->addReplyTo($mail);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $isi;

    $mail->send();
    echo '<script>alert("pesan telah dikirim, akan kami hubungi selanjutnya");</script>';
    echo '<script> window.location.href = "/";</script>';
} catch (Exception $e) {
    echo '<script>alert("pesan tidak terkirim, coba kunjungi email kami lewat email yang tertera di halaman web");</script>';
    echo '<script> window.location.href = "/";</script>';
}

?>