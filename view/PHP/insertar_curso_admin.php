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
    $query1="insert into cursos values(".$cod.",'".$nom."',".$ape.",".$usu.",'".$pass."',".$cred.")";
    $insert=pg_query($query1);
    $query2="insert into cortes values(1,100,".$cod.")";
    $insert=pg_query($query2);
    $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");

    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>