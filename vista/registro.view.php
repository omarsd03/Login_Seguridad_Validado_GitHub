<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="icomoon/style.css">
	<title>Registro</title>
	<link href='img/logo.png' rel='shortcut icon' type='image/png'>
</head>
<body>

	<header>
		<div class="container" align="center">
			<img class="img-responsive" src="img/logo.png" alt="ASFI" width="180" height="150" align="center";>
		</div>
	</header>

	<div class="container" align="center">
		<h1 class="titulo">Registrate</h1>
		<hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form" method="POST" name="login">

			<div class="input-group col-sm-4">
			    <span class="input-group-addon">
			        <i class="icon icon-user"></i>
			    </span>
			    <input type="text" class="form-control input-lg" name="usuario" placeholder="Usuario" />
			</div>
			<br>

			<div class="input-group col-sm-4">
			    <span class="input-group-addon">
			        <i class="icon icon-lock"></i>
			    </span>
			    <input type="password" class="form-control input-lg" name="password" placeholder="Contraseña" />
			</div>
			<br>

			<div class="input-group col-sm-4">
			    <span class="input-group-addon">
			        <i class="icon icon-lock"></i>
			    </span>
			    <input type="password" class="form-control input-lg" name="password2" placeholder="Repetir Contraseña" />
			    <span class="input-group-addon">
			    	<i class="btn icon-arrow-right" onclick="login.submit()"></i>
			    </span>
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
			Ya tienes cuenta?
			<a href="login.php">Iniciar Sesion</a>
		</p>
	</div>
</body>
</html>