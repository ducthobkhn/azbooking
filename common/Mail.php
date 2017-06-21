<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */

require_once('class.phpmailer.php');  
function SendMail($Sendto,$Body,$Subject)
{
    global $error;
    $mail = new PHPMailer();  // t?o m?t d?i tu?ng m?i t? class PHPMailer
    $mail->IsSMTP(); // b?t ch?c nang SMTP
    $mail->SMTPDebug = 0;  // ki?m tra l?i : 1 là  hi?n th? l?i và thông báo cho ta bi?t, 2 = ch? thông báo l?i
    $mail->SMTPAuth = true;  // b?t ch?c nang dang nh?p vào SMTP này
    $mail->SMTPSecure = 'ssl'; // s? d?ng giao th?c SSL vì gmail b?t bu?c dùng cái này
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = "thietkeweb.theoyeucau@gmail.com";  
    $mail->Password = "bachkhoa";           
    $mail->SetFrom("thietkeweb.theoyeucau@gmail.com", "timkiemphongtro.com");
    $mail->Subject = $Subject;
    $mail->Body = $Body;
    $mail->AddAddress($Sendto);
    if(!$mail->Send()) {
        $error = 'G?i mail b? l?i: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'thu c?a b?n dã du?c g?i di ';
        return true;
    }
}  
?>