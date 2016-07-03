<html>
<head>
    <title>PHPMailer - Mail() basic test</title>
</head>
<body>

<?php

require_once('../email/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = "VAI TOMAR NO CU";

$mail->SetFrom('noreplyfakeaccont@gmail.com', 'MEU PAU');

$mail->AddReplyTo("yuridimitre@hotmail.com","YURIO");

$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "John Doe");

$mail->Subject    = "PHPMailer Test Subject via mail(), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>

</body>
</html>