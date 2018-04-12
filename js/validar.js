function validarCuenta() {
	if (document.recuperarpass.usuario.value.length==0) {
		alert("Tiene que escribir su nombre de usuario");
		document.recuperarpass.usuario.focus();
		return false;
	}

	if (document.recuperarpass.password.value.length==0) {
		alert("Es necesario escribir alguna contraseña para reestablecer su cuenta");
		document.recuperarpass.password.focus();
		return false;
	}

	return true;
}