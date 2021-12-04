<?php

require_once  __DIR__ . DIRECTORY_SEPARATOR . 'lib/PHPMailer/PHPMailerAutoload.php';

function corpo_email($mensagem) {
	$template = file_get_contents('template/email/email.html');
	$template = str_replace('@MSG', $mensagem, $template);
	$template = str_replace('@APP', APP_NAME, $template);
	return $template;
}

function enviar_email($assunto, $mensagem, $nomeDes, $emailDes) {
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = EMAIL_HOST;
	$mail->Port = EMAIL_PORT;
	$mail->SMTPSecure = false;
	$mail->SMTPAuth = true;
	$mail->SMTPAutoTLS = false;
	$mail->Username = EMAIL_USER;
	$mail->Password = EMAIL_PASS;
	$mail->From = EMAIL_FROM;
	$mail->FromName = EMAIL_NAME;
	$mail->AddAddress($emailDes, $nomeDes);
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = $assunto;
	$mail->Body = corpo_email($mensagem);
	$enviado = $mail->Send();
	if ($enviado) {
		return true;
	} else {
		return false;
	}
}