<?php
require("../config.php");
require("../librerias/db_mysql.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
