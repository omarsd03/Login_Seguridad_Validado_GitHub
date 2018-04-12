<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="icomoon/style.css">
	<title>Iniciar Sesion</title>
	<link href='img/logo.png' rel='shortcut icon' type='image/png'>
</head>
<body>

	<header>
		<div class="container" align="center">
			<img class="img-responsive" src="img/logo.png" alt="ASFI" width="180" height="150" align="center";>
		</div>
	</header>

	<div class="container" align="center">
		<h1 class="titulo">Recuperar Contraseña</h1>
		<p>Confirma tu nombre de usuario e ingresa la ultima contraseña que recuerdas</p>
		<p>O bien, si solo excediste tus intentos y recuerdas tu contraseña, ingresa tu contraseña actual</p>
		<hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form" method="POST" name="recuperarpass" onsubmit="return validarCuenta()">

			<br>
			<div class="input-group col-sm-4">
			    <span class="input-group-addon">
			        <i class="icon icon-user"></i>
			    </span>
			    <input type="text" id="usuario" class="form-control input-lg" name="usuario" placeholder="Usuario" />
			</div>
			<br>

			<div class="input-group col-sm-4">
			    <span class="input-group-addon">
			        <i class="icon icon-key2"></i>
			    </span>
			    <input type="password" id="password" class="form-control input-lg" name="password" placeholder="Contraseña" />
			</div>
			<br>

			<div class="input-group col-sm-4">
				<button class="btn btn-primary submit col-sm-12" type="submit"><span class="cerrar_sesion"><i class="icon icon-undo"></i></span> Reestablecer Contraseña</button>
			</div>
			<br>

			<?php if (!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>

		</form>

		<p>
			¿Ya tienes cuenta?
			<a href="login.php">Iniciar Sesion</a>
		</p>
		<p>
	</div>

	<script src="js/validar.js"></script>

</body>
</html>