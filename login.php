<?php session_start();

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if (!isset($_SESSION['intentos'])) 
		$_SESSION['intentos'] = 0;
	elseif ($_SESSION['intentos'] >= 3) {
		//echo "Bloqueado";
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

		$stmnt = $conexion-> prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND intentos > 2');
		$stmnt->execute(array(':usuario' => $usuario));

		$resul = $stmnt->fetch();

		if ($resultado != false && $resul == false) {
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = 0 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$_SESSION['usuario'] = $usuario;
			header('Location: index.php');
		}

		else {
			$_SESSION['intentos'] += 1;
			//echo $_SESSION['intentos'];
			$statement = $conexion->prepare('UPDATE usuarios SET intentos = intentos+1 WHERE usuario = :usuario');
			$statement->execute(array(':usuario' => $usuario));
			$errores .= '<li> Datos Incorrectos o el usuario no existe. Intente Nuevamente </li>';
		}

		if ($resul != false && $_SESSION['intentos'] >= 3) {
			//header("Location: error.php");
			//header("Status: 301 Moved Permanently");
			//header("Location: login.php");
			header("Location: error.php");
		}
	}

	require 'vista/login.view.php';

?>