<?php 
        include '../db/conexion.php';
        $cod=$_GET["cod"];
        $pg=pg_query("select * from estudiantes where cod_est=".$cod."");
        $pg_array=pg_fetch_row($pg,0);
?>
