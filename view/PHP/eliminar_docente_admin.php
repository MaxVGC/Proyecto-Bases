<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $est=pg_query("delete from docentes where cod_doc=".$cod."");
    $cur=pg_query("update cursos set cod_doc=0 where cod_doc=".$cod."");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>