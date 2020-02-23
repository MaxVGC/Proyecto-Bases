<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cod=$_GET["cod"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $cursos_estudiantes=pg_query("delete from cursos_estudiantes where cod_cur=".$cur." and cod_est=".$cod."");
    $notas_estudiantes=pg_query("delete from notas where cod_cur=".$cur." and cod_est=".$cod."");
    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>