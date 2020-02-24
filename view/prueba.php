<?php 
    include '../db/conexion.php';
    $estudiantes= pg_query("select cod_est from cortes_estudiantes where cod_cur=2");
    $arr2 = pg_fetch_all_columns($estudiantes, 0);
    echo sizeof($arr2);
    #for($y=0; $y<sizeof($arr2); $y++){
    #    $insertar_notas = pg_query("insert into notas values(".(sizeof($arr)+1).",".$arr2[$y].",".$cur.",1,default)");
    #}
?>
