<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $est=pg_query("delete from estudiantes where cod_est=".$cod."");
    $cursos_estudiantes=pg_query("delete from cursos_estudiantes where cod_est=".$cod."");
    $notas_estudiantes=pg_query("delete from notas where cod_est=".$cod."");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>