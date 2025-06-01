<?php

use PHPMailer\PHPMailer\PHPMailer;

require ('phpmail/src/PHPMailer.php');
require ('phpmail/src/SMTP.php');
require ('phpmail/src/Exception.php');

function crear_mensaje_plantilla($plantilla, $datos)
{
    extract($datos);
    ob_start();
    include $plantilla;
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

function enviar_mail($destinatario, $asunto = '', $mensaje = '', $adjuntos = null)
{
    $mail = new PHPMailer(true);

    try {
        // Configure PHPMailer
        $mail->isSMTP();
        $mail->SMTPAuth = SMTP_AUTH;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;

        // Configure SMTP Server
        $mail->Host = SMTP_SERVER;
        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASS;

        // Configure Email
        $mail->setFrom(MAIL_USER);
        $mail->addAddress($destinatario, MAIL_USERNAME);
        $mail->Subject = $asunto;
        $mail->isHTML(true);
        $mail->Body = $mensaje;
        
        if (isset($adjuntos)) {
            foreach ($adjuntos as $adjunto) {
                $mail->AddAttachment($adjunto['path'], $adjunto['nombre']);
            }
        }
        
        // send mail
        $mail->Send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
