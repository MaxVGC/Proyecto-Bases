function alerta_d(){
    var nud="";
    var cod_est = prompt("Ingrese codigo del estudiante",nud);
    var nom_est = prompt("Ingrese nombre del estudiante",nud);
    var ape_est = prompt("Ingrese apellido del estudiante",nud);
    var usu_est = prompt("Ingrese usuario del estudiante",nud);
    var pass_est = prompt("Ingrese contraseña del estudiante",nud);

    if(cod_est!=null && cod_est!=""){
        var condition = confirm("¿Estas seguro de eliminar a "+cod_est+"? una vez hecho no podras recuperar los datos");
        if(condition){
            alert("El estudiante ha sido insertado");
            window.location="PHP/insertar_estudiante.php?cod_est="+cod_est+"&nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+(ape_est.toLowerCase().charAt(0).toUpperCase() + ape_est.toLowerCase().slice(1))+"&usu_est="+usu_est+"&pass_est="+pass_est+"";
        }
    }else{
        alert("No se ha podido insertar al estudiante");
    }
}