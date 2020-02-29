<?php 
	include '../../db/conexion.php';
    $cod=$_GET["cod_est"];
    $nom=$_GET["nom_est"];
    $ape=$_GET["ape_est"];
    $usu=$_GET["usu_est"];
    $pass=$_GET["pass_est"];
    $mensaje = base64_encode("admin");
    
    $query="insert into estudiantes values(".$cod.",'".$nom."','".$ape."','".$usu."','".$pass."')";
    $insert=pg_query($query);
    $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("h:i:s a")."','".$query."')");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>