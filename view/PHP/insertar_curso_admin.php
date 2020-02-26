<?php 
	include '../../db/conexion.php';
    
    $nom=$_GET["nom_est"];
    $ape=$_GET["ape_est"];
    $usu=$_GET["usu_est"];
    $pass=$_GET["pass_est"];
    $cred=$_GET["cred_est"];
    $mensaje = base64_encode("admin");
    $a=pg_query("select cod_cur from cursos order by cod_cur desc limit 1");
    $arr= pg_fetch_all_columns($a, 0);
    $cod=$arr[0]+1;
    $insert=pg_query("insert into cursos values(".$cod.",'".$nom."',".$ape.",".$usu.",'".$pass."',".$cred.")");
    $insert=pg_query("insert into cortes values(1,100,".$cod.")");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>