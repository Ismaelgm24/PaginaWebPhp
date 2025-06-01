<?php
session_start();
require("../config.php");
require("../librerias/email.php");

$mensaje = "<b>Nombre: </b>".$_REQUEST['name'];
$mensaje .= "<br><b>Email: </b>".$_REQUEST['email'];
$mensaje .= "<br><b>Asunto: </b>".$_REQUEST['asunto'];
$mensaje .= "<br><b>Mensaje: </b>".$_REQUEST['mensaje'];

if(enviar_mail('iguemar0208@g.educaand.es', "Mensaje enviado desde la web", $mensaje))
{
    $_SESSION['ok'] = "El mensaje se ha enviado correctamente";
}
else
{
    $_SESSION['ko'] = "El mensaje no se ha enviado";
}

header('Location: contact.php#formulario');