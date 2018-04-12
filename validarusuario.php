<?php 

	require 'vista/validarusuario.view.php';

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);

		$errores = '';

		try {
			$conexion = new PDO('mysql:host=localhost;dbname=loginseguridad','root','omar');
		} catch (PDOException $e) {
			echo "Error" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
		$statement->execute(array(':usuario' => $usuario));

		$resultado = $statement->fetch();

		$stmnt = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND intentos > 2');
		$stmnt->execute(array(':usuario' => $usuario));

		$resul = $stmnt->fetch();

		if ($resultado == true && $resul == true) {
			header('Location: validar.php');
		}
		
		if ($resultado == false) {
			echo"<script>alert('Este usuario no existe')</script>";
		}

		if ($resultado == true && $resul == false) {
			echo "<script>alert('Tu cuenta no esta bloqueada, si desea cambiar su contraseña, por favor inicie sesion y cambie su contraseña')</script>";
		}
	}

?>