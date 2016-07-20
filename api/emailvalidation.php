<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

require_once '../vendor/autoload.php';
require_once '../cfg/userfnc.php';
require_once '../objects/users.php';
require_once '../utils/postrequired.php';

UserIsLoggedIn();

$CurrentUser = GetCurrentUserInfo();

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';
$mail->Username = "burnitweb@gmail.com";
$mail->Password = "88134165";
$mail->setFrom('noreply@burnit.com', 'Burn-it');
$mail->addAddress($CurrentUser->Email, 'Usuário burn-it');
$mail->Subject = 'Verificação do burn-it';
$mail->msgHTML(
    "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
  <title>PHPMailer Test</title>
</head>
<body>
<div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;\">
  <div align=\"center\">
    <a href=\"http://burn-it.ddns.net\"><img src=\"../imgs/burnitCortado.png\" height='300'></a>
 </a>
  </div>
  <div align='center'>
  <h3>Por favor, verifique seu e-mail clicando <a href=\"http://burn-it.ddns.net/pages/dashboard.php?verif=" . $CurrentUser->vKey . "\">aqui</a>.</h3>
</div>
</div>
</body>
</html>");

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}