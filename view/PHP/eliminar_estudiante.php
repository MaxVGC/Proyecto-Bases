<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cod=$_GET["cod"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $query1="delete from cursos_estudiantes where cod_cur=".$cur." and cod_est=".$cod."";
    $query2="delete from notas where cod_cur=".$cur." and cod_est=".$cod."";
    $cursos_estudiantes=pg_query($query1);
    $notas_estudiantes=pg_query($query2);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");
    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>