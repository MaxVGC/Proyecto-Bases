<?php 
        include '../db/conexion.php';
        $s="select * from estudiantes";
        $result = pg_query($s);
        $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("H:i:s")."','".$s."')");
        $arr2 = pg_fetch_all_columns($result, 0);

?>
