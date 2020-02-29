<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $query1="delete from cursos where cod_cur=".$cod."";
    $query2="delete from notas where cod_cur=".$cod."";
    $query3="delete from cursos_estudiantes where cod_cur=".$cod."";
    $query4="delete from cortes where cod_cur=".$cod."";
    $est=pg_query($query1);
    $cur=pg_query($query2);
    $cur=pg_query($query3);
    $cur=pg_query($query4);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query3."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query4."')");

    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>