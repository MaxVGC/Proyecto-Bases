<?php
    include '../../db/conexion.php';
    $userf="admin";
    $cod=$_GET["cod_est"];
    $mensaje = base64_encode($userf);
    $query1="delete from docentes where cod_doc=".$cod."";
    $query2="update cursos set cod_doc=0 where cod_doc=".$cod."";
    $est=pg_query($query1);
    $cur=pg_query($query2);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");
?>