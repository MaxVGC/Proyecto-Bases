<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cod=$_GET["cod"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $query1="delete from cortes where cod_cur=".$cur." and n_corte=".$cod."";
    $query2="delete from notas where cod_cur=".$cur." and n_corte=".$cod."";
    $eliminar_de_tb_cortes=pg_query($query1);
    $eliminar_de_tb_notas=pg_query($query2);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");
    $cortes= pg_query("select n_corte,porcentaje from cortes where cod_cur=".$cur." order by n_corte asc");
    $arr = pg_fetch_all_columns($cortes, 0);
    $nvalor=100/sizeof($arr);
    for($y=0; $y<sizeof($arr); $y++){
        $query1="update cortes set n_corte=".($y+1)." where cod_cur=".$cur." and n_corte=".($arr[$y])."";
        $query2="update notas set n_corte=".($y+1)." where cod_cur=".$cur." and n_corte=".($arr[$y])."";
        $nota = pg_query($query1);
        $nota = pg_query($query2);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query2."')");    
    }
    $cortes= pg_query("select n_corte,porcentaje from cortes where cod_cur=".$cur."");
    $arr = pg_fetch_all_columns($cortes, 0);
    for($y=0; $y<sizeof($arr); $y++){
        $query1="update cortes set porcentaje=".$nvalor." where cod_cur=".$cur." and n_corte=".($y+1)."";
        $nota = pg_query($query1);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query1."')");
    }


    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>