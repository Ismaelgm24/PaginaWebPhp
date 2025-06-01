<?php


require("../config.php");
require("../librerias/db_mysql.php");
  $conn=db_open();


    $num_por_pagina=3; //Items
    $pagina=isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la pagina

    $offset=($pagina-1)*$num_por_pagina;

    // Construir la consulta SQL con búsqueda
    $sql = "SELECT * FROM posts";
    $params = [];

    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
        $buscar = '%' . $_GET['buscar'] . '%';
        $sql .= " WHERE titulo LIKE ? OR contenido LIKE ?";
        $params = [$buscar, $buscar];
    }

    $sql .= " LIMIT $num_por_pagina OFFSET $offset";

    $post = db_query($conn, $sql, $params);

    // Actualizar el total para la paginación
    $total_sql = "SELECT COUNT(*) as total FROM posts";
    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
        $total_sql .= " WHERE titulo LIKE ? OR contenido LIKE ?";
        $total = db_query($conn, $total_sql, [$buscar, $buscar])[0]['total'];
    } else {
        $total = db_query($conn, $total_sql)[0]['total'];
    }

    $num_paginas=ceil($total/$num_por_pagina);
    
db_close($conn);


$titulo="Productos";
$vista="product";
require('../vistas/public/plantilla.html.php');