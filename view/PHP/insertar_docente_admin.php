<?php 
	include '../../db/conexion.php';
    
    $nom=$_GET["nom_est"];
    $ape=$_GET["ape_est"];
    $usu=$_GET["usu_est"];
    $pass=$_GET["pass_est"];
    $mensaje = base64_encode("admin");
    $a=pg_query("select cod_doc from docentes order by cod_doc desc limit 1");
    $arr= pg_fetch_all_columns($a, 0);
    $cod=$arr[0]+1;
    $insert=pg_query("insert into docentes values(".$cod.",'".$nom."','".$ape."','".$usu."','".$pass."');");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>