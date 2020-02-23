<?php
    function tabla_cursos($userf,$curso) {
        include '../db/conexion.php';
        $cod_cur = pg_query("select cod_cur from cursos where nom_cur='".$curso."'");
        $cod_cur_arr= pg_fetch_all_columns($cod_cur, 0);
        
        echo '
        <div class="accordion" id="accordion_'.str_replace(' ','',$curso).'">
            <div class="card">
            <div class="card-header" id="headingOne" style="background: black;">
            <h2 class="mb-0" style="color:white; font-size:1rem">
            <button id="button_accordion" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'.str_replace(' ','',$curso).'" aria-expanded="false" aria-controls="collapse_'.str_replace(' ','',$curso).'">
                '.$curso.'
            </button>
            </h2>
           
            </div>
      
            <div id="collapse_'.str_replace(' ','',$curso).'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_'.str_replace(' ','',$curso).'">
            <div class="card-body table-responsive" style="overflow-x: scroll;">
            <table class="table" style="background: black;color: white;" id="table_skin">
            <thead>
              <tr>
                <th scope="col"><center>Codigo</center></th>
                <th scope="col"><center>Nombre</center></th>
                <th scope="col"><center>Apellido</center></th>
                ';get_cortes_est($cod_cur_arr[0]);echo'
                <th scope="col"><center>Nota final</center></th>
              </tr>
            </thead>
            <tbody>
                ';get_estudiantes($cod_cur_arr[0]);echo'
            </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="alerta_'.str_replace(' ','',$curso).'()">Eliminar estudiante</button>
            ';echo'
            <script type="text/javascript" >
                function alerta_'.str_replace(' ','',$curso).'(){
                        var pass = prompt("Ingrese codigo del estudiante a borrar");
                        var condition = confirm("¿Estas seguro de eliminar a "+pass+"? una vez hecho no podras recuperar los datos");
                        if(condition){
                            alert("El estudiante a sido eliminado");
                            window.location="PHP/eliminar_estudiante.php?cod="+pass+"&cur='.$cod_cur_arr[0].'&user='.$userf.'";
                        }
                }
          </script>
            ';echo '
            </div>
            <div class="card-footer" id="button_accordion" style="background: black;color: dodgerblue;">
            Profesor: <p id="button_accordion" style="margin-bottom:0;color:white" >hola</p>
            </div>
            </div>
            </div>
        </div>
        <br>
        ';
        return '';
    }
    
    function div_cursos($userf){
        include '../db/conexion.php';
        $result = pg_query("select cursos.nom_cur from cursos,docentes where cursos.cod_doc=docentes.cod_doc and docentes.usu_doc='".$userf."'");
        $result2 = pg_query("select nom_cur from cursos");

        $arr = pg_fetch_all_columns($result, 0);
        $arr2 = pg_fetch_all_columns($result2, 0);

        for($x=0; $x<sizeof($arr); $x++){
            for($y=0; $y<sizeof($arr2); $y++){
                if($arr[$x]==$arr2[$y]){
                    $s=tabla_cursos($userf,$arr2[$y]);
                }
            }
        }
    }
    function get_estudiantes($cod_cur){
        include '../db/conexion.php';
        $estudiantes = pg_query("select estudiantes.cod_est,estudiantes.nom_est,estudiantes.ape_est from cursos_estudiantes,estudiantes where cursos_estudiantes.cod_est=estudiantes.cod_est and cursos_estudiantes.cod_cur=".$cod_cur." order by estudiantes.cod_est asc");
        $arr = pg_fetch_all_columns($estudiantes, 0);

        for($y=0; $y<sizeof($arr); $y++){
          $arr2 = pg_fetch_array($estudiantes, $y);
          echo '
            <tr>
              <td><center>'.$arr2[0].'</center></td>
              <td><center>'.$arr2[1].'</center></td>
              <td><center>'.$arr2[2].'</center></td>
              ';get_notas_est($cod_cur,$arr2[0]);echo'
              <td><center>'.notafinal($cod_cur,$arr2[0]).'</center></td>
            </tr>
          ';
        }
    }

    function get_notas_est($cod_cur,$cod_est){
      include '../db/conexion.php';
      $estudiantes = pg_query("select notas.n_corte,notas.nota from notas,estudiantes where notas.cod_est=estudiantes.cod_est and notas.cod_cur=".$cod_cur." and estudiantes.cod_est=".$cod_est."");
      $arr = pg_fetch_all_columns($estudiantes, 0);
      for($y=0; $y<sizeof($arr); $y++){
        $arr2 = pg_fetch_all_columns($estudiantes,1);
        echo '<td><center>'.$arr2[$y].'</center></td>';
      }
    }

    function get_cortes_est($cod_cur){
      include '../db/conexion.php';
      $cortes = pg_query("select n_corte,porcentaje from cortes where cod_cur=".$cod_cur."");
      $arr = pg_fetch_all_columns($cortes, 0);
      for($y=0; $y<sizeof($arr); $y++){
        $arr2 = pg_fetch_all_columns($cortes,0);
        $arr3 = pg_fetch_all_columns($cortes,1);
        echo '<th scope="col"><center>Corte '.$arr2[$y].' ('.$arr3[$y].'%)</center></th>';
      }
    }

    function notafinal($cod_cur,$cod_est){
      include '../db/conexion.php';
      $notas = pg_query("select notas.nota from notas,estudiantes where notas.cod_est=estudiantes.cod_est and notas.cod_cur=".$cod_cur." and estudiantes.cod_est=".$cod_est."");
      $cortes = pg_query("select porcentaje from cortes where cod_cur=".$cod_cur."");
      $arr = pg_fetch_all_columns($notas, 0);
      $arr2 = pg_fetch_all_columns($cortes, 0);
      $nota=0;
      for($y=0; $y<sizeof($arr); $y++){
        $nota = $nota+($arr[$y]*($arr2[$y]/100));
      }
      return $nota;
    }

    
?>