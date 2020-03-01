<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cod_est=$_GET["cod"];
    $cur=$_GET["cur"];
    $corte=$_GET["corte"];
    $nota=$_GET["nota"];
    $mensaje = base64_encode($userf);
    $query="UPDATE notas SET nota = ".$nota." WHERE cod_cur=".$cur." and cod_est=".$cod_est." and n_corte=".$corte."";
    $update_nota= pg_query($query);
    $pg= pg_query("insert into registros values(default,'".$userf."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>