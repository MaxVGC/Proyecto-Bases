<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cod_est=$_GET["cod"];
    $cur=$_GET["cur"];
    $corte=$_GET["corte"];
    $nota=$_GET["nota"];
    $mensaje = base64_encode($userf);
    $update_nota= pg_query("UPDATE notas SET nota = ".$nota." WHERE cod_cur=".$cur." and cod_est=".$cod_est." and n_corte=".$corte."");
    header("Location: ../Profesor_cursos.php?user=$mensaje");
?>