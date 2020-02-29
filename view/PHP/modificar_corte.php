<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cur=$_GET["cur"];
    $ncortes=(int)($_GET["ncor"]);
    $mensaje = base64_encode($userf);
    $cortes=array();
    
    for($y=0; $y<$ncortes; $y++){
        array_push($cortes,(int)$_GET["c".($y+1)]);
    }
    for($y=0; $y<$ncortes; $y++){
        $query="UPDATE cortes SET porcentaje = ".$cortes[$y]." WHERE cod_cur=".$cur." and n_corte=".($y+1)."";
        $actualizar_cortes=pg_query($query);
        $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".$query."')");
    }
    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>