<?php session_start();

	if (isset($_SESSION['usuario'])) {
		require 'vista/contenido.view.php';
	} else {
		header('Location: login.php');
	}
	
?>