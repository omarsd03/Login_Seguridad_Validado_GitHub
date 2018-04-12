function validarUsuario() {
	if (document.validarusuario.usuario.value.length==0) {
		alert("Por favor escriba su nombre de usuario");
		document.validarusuario.usuario.focus();
		return false;
	}
	return true;
}