<?php session_start();

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if (!isset($_SESSION['intentos'])) 
		$_SESSION['intentos'] = 0;
	elseif ($_SESSION['intentos'] >= 3) {
		//echo "Bloqueado";
		echo "Tu cuenta se encuentra bloqueada.. :/";
	}

	$errores = '';
	//$contador = 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
		$password = $_POST['password'];
		$password = hash('sha512', $password);

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=loginseguridad','root','omar');
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
		$statement->execute(array(':usuario' => $usuario, ':password' => $password));

		$resultado = $statement->fetch();

		if ($resultado != false) {
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = 0 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$_SESSION['usuario'] = $usuario;
			header('Location: index.php');
		}
		// else {
		//	$errores .= '<li> Datos Incorrectos. Intente Nuevamente </li>';
		//}
		if ($resultado == false) {
			$_SESSION['intentos'] += 1;
			echo $_SESSION['intentos'];
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = intentos+1 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$errores .= '<li> Datos Incorrectos. Intente Nuevamente </li>';

			//$stmnt = $conexion-> prepare('DELETE FROM usuarios WHERE usuario = :usuario AND intentos > 2');
			//$stmnt->execute(array(':usuario' => $usuario));
			if ($_SESSION['intentos'] >= 3) {
				echo "Bloqueado..";
				//unset($_SESSION['usuario']);
			}
		}
	}

	require 'vista/login.view.php';

?>