<?php 
	include '../../db/conexion.php';
    $cod=$_GET["cod_est"];
    $nom=$_GET["nom_est"];
    $ape=$_GET["ape_est"];
    $usu=$_GET["usu_est"];
    $pass=$_GET["pass_est"];
    $cred=$_GET["cred_est"];
    $mensaje = base64_encode("admin");
    $pg="update cursos set nom_cur='".$nom."',semestre=".$ape.",cod_doc=".$usu.",pass_cur='".$pass."',creditos=".$cred." where cod_cur=".$cod."";
    $query = pg_query($pg);
    $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$pg)."')");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>