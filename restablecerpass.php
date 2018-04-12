<?php session_start();

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		$errores = '';

		if (empty($usuario) or empty($password) or empty($password2)) {
			$errores .= '<li>Por favor llena los campos correctamente</li>';
		} else {
			try {
				$conexion = new PDO('mysql:host=localhost;dbname=loginseguridad','root','omar');
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$statement = $conexion->prepare('SELECT pass FROM usuarios WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$resultado = $statement->fetch();

			if ($resultado != false) {
				foreach ($resultado as $comparapass) {
					//echo $comparapass;
					if ($comparapass == $password) {
						echo "<script>alert('No puedes ingresar la misma contraseña anterior, porfavor ingresa una nueva')</script>";
					}
					else {
						$errores = '1';
					}
				}
			}

			if ($password != $password2) {
				$errores = '';
				echo "<script>alert('Las contraseñas no coinciden, intentalo de nuevo..')</script>";
			}
		}

		if ($errores == '1') {
			$statement = $conexion->prepare('UPDATE usuarios SET pass = :pass, intentos = 0 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario, ':pass' => $password));
			echo "<script>alert('Contraseña actualizada, ya puedes iniciar sesion');window.location.href='login.php';</script>";
		}
	}

	require 'vista/restablecerpass.view.php';

?>