<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $est=pg_query("delete from cursos where cod_cur=".$cod."");
    $cur=pg_query("delete from notas where cod_cur=".$cod."");
    $cur=pg_query("delete from cursos_estudiantes where cod_cur=".$cod."");
    $cur=pg_query("delete from cortes where cod_cur=".$cod."");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>