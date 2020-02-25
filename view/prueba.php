<?php 
    include '../db/conexion.php';
    $consulta="select cod_est from cursos_estudiantes where cod_cur=2";
    $estudiantes= pg_query($consulta);
    echo $consulta;
?>
