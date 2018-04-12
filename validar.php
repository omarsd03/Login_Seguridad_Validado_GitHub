<?php session_start();

	require 'vista/validar.view.php';

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
		$password = $_POST['password'];

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=loginseguridad','root','omar');
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT usuario FROM usuarios WHERE usuario = :usuario');
		$statement->execute(array(':usuario' => $usuario));

		$resultado = $statement->fetch();

		if ($resultado != false) {

			$stmnt = $conexion->prepare('SELECT pass FROM usuarios WHERE usuario = :usuario AND pass = :password');
			$stmnt->execute(array(':usuario' => $usuario, ':password' => $password));
			$resul = $stmnt->fetch();

			$consulta = $conexion->prepare('SELECT SUBSTRING(pass,1,3) FROM usuarios WHERE usuario = :usuario');
			$consulta->execute(array(':usuario' => $usuario));
			$res = $consulta->fetch();

			if ($resul != false) {
				echo "<script>alert('Tu cuenta ha sido recuperada, ya puedes iniciar sesion con tu misma contraseña')</script>";
				$statement = $conexion->prepare('UPDATE usuarios SET intentos = 0 WHERE usuario = :usuario');
				$statement->execute(array(':usuario' => $usuario));
			}

			if ($res != false) {
				foreach ($res as $value) {
					$rest = substr($password, 0, 3);
					if ($value == $rest) {
						header('Location: restablecerpass.php');
					}
					else {
						echo "<script>alert('Lo sentimos, no podemos recuperar tu cuenta, intentalo mas tarde..');window.location.href='login.php';</script>";
					}

				}
			}
			else {
				echo "no ejecutada";
			}
		}
		else {
			echo"<script>alert('Este usuario no existe')</script>";
		}
	}

?>