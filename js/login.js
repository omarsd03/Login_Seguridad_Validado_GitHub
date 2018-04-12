function validarLogin() {
	//Validacion placeholder usuario
	if (document.login.usuario.value.length == 0) {
		alert("Tiene que escribir su nombre de usuario");
		document.login.usuario.focus();
		return false;
	}

	if (document.login.usuario.value.length < 4) {
		alert("El nombre de usuario debe ser minimo de 5 caracteres");
		document.login.usuario.select();
		return false;
	}

	if (document.login.usuario.value.length > 14) {
		alert("El nombre de usuario es demasiado largo, porfavor escribe un nombre de usuario mas corto");
		//document.login.usuario.focus();
		document.login.usuario.select();
		return false;
	}

	valor = document.getElementById("usuario").value;
	if (!(/^[a-z0-9ü][a-z0-9ü_]{3,13}$/.test(valor))) {
		alert("El nombre de usuario no acepta mayusculas ni simbolos especiales, intenta de nuevo porfavor");
		return false;
	}

	//Validacion placeholder password
	if (document.login.password.value.length == 0) {
		alert("Tiene que escribir su contraseña");
		document.login.password.focus();
		return false;
	}

	if (document.login.password.value.length > 20) {
		alert("La contraseña es demasiado larga, ingresa una mas corta");
		document.login.password.focus();
		return false;
	}

	if (document.login.password.value.length < 6) {
		alert("La contraseña es demasiado corta, ingrese una de minimo 7 caracteres");
		document.login.password.focus();
		return false;
	}
	
	return true;
}