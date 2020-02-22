<?php 
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $cortes=pg_query("select count(*) from cortes where cod_cur=".$cur."");
    $cortes_arr = pg_fetch_all_columns($cortes, 0);
    $cod_usu=pg_query("select cod_est from estudiantes where usu_est='".$userf."'");
    $cod_arr = pg_fetch_all_columns($cod_usu, 0);
    $n_cortes=$cortes_arr[0];
    if(date("z")>182){
        $query2=pg_query("insert into cursos_estudiantes values(".$cur.",".$cod_arr[0].",'".date("Y")."-2')");
    }else{
        $query2=pg_query("insert into cursos_estudiantes values(".$cur.",".$cod_arr[0].",'".date("Y")."-1')");
    }
    for($y=0; $y<$n_cortes; $y++){
        $aux=$y+1;
        $query=pg_query("insert into notas values(".$aux.",".$cod_arr[0].",".$cur.",0)");
    }
    header("Location: ../inscribirse.php?user=$mensaje");
?>