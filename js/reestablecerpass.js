function validarReestablecer() {
	if (document.login.usuario.value.length==0) {
		alert("Tiene que escribir su nombre de usuario");
		document.login.usuario.focus();
		return false;
	}

	if (document.login.password.value.length==0) {
		alert("Tiene que escribir una contraseña nueva");
		document.login.password.focus();
		return false;
	}

	if (document.login.password2.value.length==0) {
		alert("Es necesario escribir su nueva contraseña para reestablecer");
		document.login.password2.focus();
		return false;
	}

	if (document.login.password.value.length>20) {
		alert("La contraseña es demasiado larga, ingresa una mas corta");
		document.login.password.focus();
		return false;
	}

	if (document.login.password.value.length<6) {
		alert("La contraseña es demasiado corta, ingrese una de minimo 7 caracteres");
		document.login.password.focus();
		return false;
	}

	//Validacion placeholder password2
	if (document.login.password2.value.length==0) {
		alert("Tiene que reescribir su contraseña");
		document.login.password2.focus();
		return false;
	}

	return true;
}