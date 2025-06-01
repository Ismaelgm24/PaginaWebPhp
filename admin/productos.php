<?php
require('comun.inc.php');

$conn = db_open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_FILES['foto']))
	{
		copy($_FILES['foto']['tmp_name'], 'imagenes/productos/'.$_REQUEST['id'].'.jpg');
		header('Location: productos.php?editar=' . $id);
		exit;
	}
	$posts['id'] = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
	$posts['titulo'] = $_REQUEST['titulo'];
	$posts['contenido'] = $_REQUEST['contenido'];
	$posts['fecha'] = date('Y-m-d H:i:s');
	$posts['usuario_id'] = $_SESSION['usuario']['id'];

	if ($posts['id'] == null) {
		$id = db_insert($conn, 'posts', $posts);
	} else {
		db_update($conn, 'posts', $posts);
		$id = $posts['id'];
	}


	$conn = db_close($conn);
	header('Location: productos.php?editar=' . $id);
} else {
	// Para borrar
	if (isset($_REQUEST['borrar']) and is_integer(intval($_REQUEST['borrar']))) {
		db_delete_by_id($conn, 'posts', $_REQUEST['borrar']);
		// Para editar. Comprobamos que está el parámetro editar y es un número entero
	} else if (isset($_REQUEST['editar']) and is_integer(intval($_REQUEST['editar']))) {
		$id = intval($_REQUEST['editar']);
		// Cargamos el producto con el id
		$res = db_query($conn, "SELECT * FROM posts WHERE id=?", [$id]);

		if (is_array($res) && count($res) == 1) {
			$posts = $res[0];
		}
	}
}



$num_por_pagina=4; //Items
$pagina=isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la pagina

$offset = ($pagina-1)*$num_por_pagina;

// Construir la consulta SQL con búsqueda
$sql = "SELECT p.*, u.nombre as usuario FROM posts p 
        INNER JOIN usuarios u ON p.usuario_id = u.id";

$params = [];
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $buscar = '%' . $_GET['buscar'] . '%';
    $sql .= " WHERE p.titulo LIKE ? OR p.contenido LIKE ?";
    $params = [$buscar, $buscar];
}

$sql .= " LIMIT $num_por_pagina OFFSET $offset";

$post = db_query($conn, $sql, $params);

// Actualizar el total para la paginación
$total_sql = "SELECT COUNT(*) as total FROM posts p";
if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $total_sql .= " WHERE p.titulo LIKE ? OR p.contenido LIKE ?";
    $total = db_query($conn, $total_sql, [$buscar, $buscar])[0]['total'];
} else {
    $total = db_query($conn, $total_sql)[0]['total'];
}

$num_paginas = ceil($total/$num_por_pagina);

$conn = db_close($conn);
$titulo = "Gestión de productos";
$vista = 'productos';

require("../vistas/admin/plantilla.html.php");
