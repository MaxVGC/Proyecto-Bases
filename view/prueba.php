<?php 
    include '../db/conexion.php';
    $estudiantes = pg_query("select estudiantes.cod_est,estudiantes.nom_est,estudiantes.ape_est from cursos_estudiantes,estudiantes where cursos_estudiantes.cod_est=estudiantes.cod_est and cursos_estudiantes.cod_cur=2");
    $arr = pg_fetch_all_columns($estudiantes, 0);
    for($y=0; $y<sizeof($arr); $y++){
      $arr2 = pg_fetch_array($estudiantes, $y);
      echo '
        <tr>
          <td>'.$arr2[0].'</td>
          <td>'.$arr2[1].'</td>
          <td>'.$arr2[2].'</td>
          <td>0</td>
        </tr>
      ';
    }
?>
