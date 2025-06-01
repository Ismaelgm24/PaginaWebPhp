<?php
require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$usuario['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$usuario['nombre'] = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
	$usuario['nombre_completo'] = isset($_REQUEST['nombre_completo']) ? $_REQUEST['nombre_completo'] : null;
	$usuario['email'] = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$usuario['telefono'] = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : null;
	$usuario['password'] = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

	if ($usuario['id'] == null) {
		$id = db_insert($conn, 'usuarios', $usuario);
	} else {
		db_update($conn, 'usuarios', $usuario);
		$id = $usuario['id'];
	}

	$conn = db_close($conn);
	header('Location: usuarios.php?editar=' . $id);
} else {
	// Para borrar
	if (isset($_REQUEST['borrar']) and is_integer(intval($_REQUEST['borrar']))) {
		db_delete_by_id($conn, 'usuarios', $_REQUEST['borrar']);
		// Para editar. Comprobamos que está el parámetro editar y es un número entero
	} else if (isset($_REQUEST['editar']) and is_integer(intval($_REQUEST['editar']))) {
		$id = intval($_REQUEST['editar']);
		// Cargamos el usuario con el id
		$res = db_query($conn, "SELECT * FROM usuarios WHERE id=?", [$id]);

		if (count($res) == 1) {
			$usuario = $res[0];
		}
	}
}

$num_por_pagina = 9; //Items
$pagina = isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la pagina

$total = db_query($conn, "select count(*) as total from usuarios")[0]['total'];

$num_paginas = ceil($total/$num_por_pagina);

$offset = ($pagina-1)*$num_por_pagina;

$usuarios = db_query($conn, "SELECT * FROM usuarios limit $num_por_pagina offset $offset");

$conn = db_close($conn);

$titulo = "Gestión de usuarios";
$vista = 'usuarios';
require("../vistas/admin/plantilla.html.php");
