function validarLogin() {
    var usuario=document.getElementById("txtUsuario").value;
    if (usuario=="") {
        alertify.error('Debes Ingresar un Usuario');
    }else if(usuario!=""){
        alertify.success('Usuario Correcto');
    }
}