<?php
require('../config.php');
require('../librerias/db_mysql.php');

session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

	// TODO: Habría que validar	
	$conn = db_open();
	// Obtenemos los usuarios con email y password ingresados
	$res = db_query($conn, "SELECT * FROM usuarios WHERE email=? AND password=?", [$email, $password]);

	if (count($res) == 1) { // Existe el usuario
		$usuario = $res[0];
		$_SESSION['usuario'] = $usuario;
		
		// Actualizamos la última conexión en la base de datos y en la sesión
		$fecha_actual = date('Y-m-d H:i:s');
		db_query($conn, "UPDATE usuarios SET ultima_conexion = ? WHERE id = ?", [$fecha_actual, $usuario['id']]);
		$_SESSION['usuario']['ultima_conexion'] = $fecha_actual;
		
		header('Location: dashboard.php');
		exit;
	} else {
		$_SESSION['error'] = 'El usuario no existe o la contraseña es incorrecta';
	}

	db_close($conn);
}
require('../vistas/admin/login.html.php');

