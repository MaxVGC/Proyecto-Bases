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
        $query="insert into cursos_estudiantes values(".$cur.",".$cod_arr[0].",'".date("Y")."-2')";
        $query2=pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    }else{
        $query="insert into cursos_estudiantes values(".$cur.",".$cod_arr[0].",'".date("Y")."-1')";
        $query2=pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    }
    for($y=0; $y<$n_cortes; $y++){
        $aux=$y+1;
        $query="insert into notas values(".$aux.",".$cod_arr[0].",".$cur.",0)";
        $que=pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    }
    header("Location: ../Estudiante_inscribirse.php?user=$mensaje");
    
?>ole cree la vista