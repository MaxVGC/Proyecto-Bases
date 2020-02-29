<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $query1="delete from estudiantes where cod_est=".$cod."";
    $query2="delete from cursos_estudiantes where cod_est=".$cod."";
    $query3="delete from notas where cod_est=".$cod."";
    $est=pg_query($query1);
    $cursos_estudiantes=pg_query($query2);
    $notas_estudiantes=pg_query($query3);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query3."')");

    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>