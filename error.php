<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar Sesion</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="icomoon/style.css">
	<link href='img/logo.png' rel='shortcut icon' type='image/png'>
</head>
<body>

	<header>
		<div class="container" align="center">
			<img class="img-responsive" src="img/logo.png" alt="ASFI" width="180" height="150" align="center";>
		</div>
	</header>

	<h1><span class="bienvenido"><i class="icon icon-lock"></i></span> Lo sentimos, tu cuenta ha sido bloqueada por exceso de intentos</h1>
	<br>
	<h2><span class="bienvenido"><i class="icon icon-sad2"></i></span> Espere un momento, será redireccionado...</h2>
	<?php 

		ob_start();
		header("refresh: 3; url = login.php");
		ob_end_flush();

	?>
</body>
</html>