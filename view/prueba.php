<?php 
        include '../db/conexion.php';
        $pg=pg_query("select * from estudiantes");
        $pg_array=pg_fetch_row($pg,0);
        echo $pg_array[0].' '.$pg_array[1];
?>
