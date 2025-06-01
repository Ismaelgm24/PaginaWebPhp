<?php
session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: dashboard.php');
	exit;
} else {
	header('Location: login.php');
	exit;
}
