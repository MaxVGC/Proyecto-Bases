<?php
    include '../../db/conexion.php';
    $userf=$_GET["user"];
    $cur=$_GET["cur"];
    $mensaje = base64_encode($userf);
    $cortes= pg_query("select n_corte from cortes where cod_cur=".$cur."");
    $arr = pg_fetch_all_columns($cortes, 0);
    echo '
        <script type="text/javascript" >
            var arr =  new Array('.sizeof($arr).');   
        </script>
    ';
    for($y=0; $y<sizeof($arr); $y++){
        echo'
            <script type="text/javascript" >
                arr['.$y.'] = prompt("Ingresa porcentaje del corte '.$arr[$y].'");
            </script>
        ';
    }
    $porcentajes = array(sizeof($arr));
    $suma=0;
    for($y=0; $y<sizeof($arr); $y++){
        $porcentajes[$y]='<script type="text/javascript">document.write(arr['.$y.']);</script>';
        echo gettype($porcentajes[$y]).' '.$porcentajes[$y];
    }
    
    if($suma==101){
        echo 'entro';
        for($y=0; $y<sizeof($arr); $y++){
            $update_cortes= pg_query("UPDATE cortes SET porcentajes = ".$porcentajes[$y]." WHERE cod_cur=".$cur." and n_corte=".($y+1)."");
        }
    }else{
        #echo '
        #<script type="text/javascript" >
        #    alert("La suma de los porcentajes debe ser igual a 100 por favor intentar nuevamente");
        #    window.location="../Profesor_cursos.php?user='.$mensaje.'";   
        #</script>
        #';
    }
?>