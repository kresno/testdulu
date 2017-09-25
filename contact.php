<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 9/24/2017
 * Time: 11:39 PM
 */
$admin_email = "kresno.19@gmail.com";
$email =$_POST['email'];
$subject = $_POST['subject'];
$comments = $_POST['comments'];

//sendemail

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); date_default_timezone_set('Etc/UTC');
    /*autoload phpmailer*/ require 'PHPMailer/class.phpmailer.php';
    $mail = new PHPMailer; $mail->isSMTP();

/*dipakai debugging,
 * 0 = off (for production use)
 * 1 = client messages
 * 2 = client and server messages
 * */
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
/**jika kebetulan network SMTP di block lewat IPv6 maka gunakan kode ini
 * $mail->Host = gethostbyname('smtp.gmail.com');
 * */
$mail->Port = 587; //ini adalah port default mbah google
$mail->SMTPSecure = 'tls'; //security pakai ssl atau tls, tapi ssl telah deprecated
$mail->SMTPAuth = true; //menandakan butuh authentifikasi
$mail->Username = $admin_email;//email anda
$mail->Password = "akun google"; //password anda, silakan diganti
$mail->setFrom($email);
$mail->addAddress($admin_email);
$mail->Subject = 'Email Buat Test Doang';
$mail->msgHTML($comments, "");
$mail->AltBody = 'Ini Pesan yang Plain Text Beb';
if (!$mail->send()) {
    echo "Ada Yang Error Gan: " . $mail->ErrorInfo;
} else {
    echo "Berhasil di Send!";
}
?>