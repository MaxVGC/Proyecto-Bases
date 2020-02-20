<?php 
    include '../db/conexion.php';
    $result = pg_query("select notas.n_corte,notas.nota,docentes.nom_doc,docentes.ape_doc from estudiantes,cursos,notas,docentes where estudiantes.cod_est=notas.cod_est and notas.cod_cur=cursos.cod_cur and cursos.cod_doc=docentes.cod_doc and estudiantes.usu_est='MaxVGC' and cursos.nom_cur='Bases de datos'
        ");
        $arr = pg_fetch_all_columns($result, 0);
        $arr2 = pg_fetch_all_columns($result, 1);
    for($y=0; $y<sizeof($arr); $y++){
        
        echo $arr[$y];
        echo 'arr['.$y.']'.' arr<br>';
    }

    for($y=0; $y<sizeof($arr2); $y++){
        echo $arr2[$y];
        echo 'arr2['.$y.']'.' arr2<br>';
    }
?>