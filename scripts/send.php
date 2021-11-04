<?php
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';
require '../lib/PHPMailer/src/Exception.php';

$name = $_POST['nameFF'];
$email = $_POST['contactFF'];
$text = $_POST['messageFF'];
$file = $_FILES['fileFF'];
$ip = $_SERVER['REMOTE_ADDR'];

$title = "Сообщение от $name";
$body = "
<h2>Сообщение от $name</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br>
<b>IP адрес:</b> $ip<br><br>
<b>Сообщение:</b><br>$text";

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    $mail->Host       = 'smtp.mail.ru';
    $mail->Username   = 'mailer@afganproject.tk';
    $mail->Password   = '*********';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('mailer@afganproject.tk', 'Mailer');

    $mail->addAddress('d.karpenko@afganproject.tk');
    $mail->addAddress('a.kolomoec@afganproject.tk');

    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    $mail->AddAttachment($_FILES['files']['tmp_name'],$_FILES['files']['name']);
    
    if ($mail->send()) {$result = "success";$status = '<script>alert("Ваше сообщение получено, спасибо!");</script>';} 
    else {$result = "error";$status = '<script>alert("Ошибка отправки сообщения!");</script>';}

} catch (Exception $e) {
    $result = "error";
    $status = "<script>alert(Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo});</script>";
}
echo $status;?>
<form name="status" action="../.." method="POST" id="status"></form>
<script>
var auto_refresh = setInterval(function() { submitform(); }, 500);

function submitform()
{
  document.getElementById("status").submit();
}
</script>
