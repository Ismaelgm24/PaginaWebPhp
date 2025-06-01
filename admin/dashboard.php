<?php
require('comun.inc.php');

$conn = db_open();

// Obtener los 4 últimos posts
$posts = db_query($conn, "SELECT p.*, u.nombre as usuario FROM posts p 
                         INNER JOIN usuarios u ON p.usuario_id = u.id 
                         ORDER BY p.fecha DESC LIMIT 4");

$conn = db_close($conn);

$titulo = "Dashboard";
$vista = 'dashboard';
require("../vistas/admin/plantilla.html.php");