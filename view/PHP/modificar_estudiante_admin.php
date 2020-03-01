<?php
    include '../../db/conexion.php';
    $cod=$_GET["cod_est"];
    $nom=$_GET["nom_est"];
    $ape=$_GET["ape_est"];
    $usu=$_GET["usu_est"];
    $pass=$_GET["pass_est"];
    $mensaje = base64_encode("admin");
    $pg="update estudiantes set nom_est='".$nom."',ape_est='".$ape."',usu_est='".$usu."',pass_est='".$pass."' where cod_est=".$cod."";
    $query = pg_query($pg);
    $pg= pg_query("insert into registros values(default,'admin','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$pg)."')");
    header("Location: ../Admin_administrar_tablas.php?user=$mensaje");

?>