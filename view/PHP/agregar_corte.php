<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $cortes= pg_query("select n_corte from cortes where cod_cur=".$cur."");
    $arr = pg_fetch_all_columns($cortes, 0);
    $query="insert into cortes values(".(sizeof($arr)+1).",".(100/sizeof($arr)).",".$cur.")";
    $insertar_en_tb_cortes=pg_query($query);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    $estudiantes= pg_query("select cod_est from cursos_estudiantes where cod_cur=".$cur."");
    $arr2 = pg_fetch_all_columns($estudiantes, 0);
    for($y=0; $y<sizeof($arr2); $y++){
        $query="insert into notas values(".(sizeof($arr)+1).",".$arr2[$y].",".$cur.",0)";
        $insertar_notas = pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    }
    $cortes= pg_query("select n_corte from cortes where cod_cur=".$cur."");
    $arr3 = pg_fetch_all_columns($cortes, 0);
    $nvalor=100/sizeof($arr3);
    for($y=0; $y<sizeof($arr3); $y++){
        $query="update cortes set porcentaje=".$nvalor." where cod_cur=".$cur." and n_corte=".($y+1)."";
        $nota = pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    }
    header("Location: ../Profesor_cursos.php?user=$mensaje");

?>