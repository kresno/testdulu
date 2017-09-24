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

mail($admin_email, $subject, $subject, "From:" . $email);


?>