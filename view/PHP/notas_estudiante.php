<?php
    function get_nota($userf,$curso) {
        include '../db/conexion.php';
        $result = pg_query("select cursos.nombre,notas.corte_1,notas.corte_2,notas.corte_3 from notas,estudiantes,cursos where estudiantes.codigo=notas.cod_est and notas.cod_cur=cursos.id and estudiantes.usuario='".$userf."' and cursos.nombre='".$curso."'");
        
        $arr = pg_fetch_array($result, 0);
        echo '
        <div class="accordion" id="accordionExample">
            <div class="card">
            <div class="card-header" id="headingOne">
            <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.str_replace(' ','',$curso).'" aria-expanded="false" aria-controls="collapse'.str_replace(' ','',$curso).'">
                '.$curso.'
            </button>
            </h2>
            </div>
      
            <div id="collapse'.str_replace(' ','',$curso).'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">Corte 1</th>
                <th scope="col">Corte 2</th>
                <th scope="col">Corte 3</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>'.$arr[1].'</td>
                <td>'.$arr[2].'</td>
                <td>'.$arr[3].'</td>
              </tr>
            </tbody>
          </table>
            </div>
            </div>
            </div>
        </div>
        ';
        return '';
    }
    
    function div_notas($userf){
        include '../db/conexion.php';
        $result = pg_query("select cursos.nombre from notas,estudiantes,cursos where notas.cod_est=estudiantes.codigo and notas.cod_cur=cursos.id and estudiantes.usuario='".$userf."'");
        $arr = pg_fetch_all_columns($result, 0);

        if($arr[0]='Bases de datos'){
            $s=get_nota($userf,$arr[0]);
        }
        if($arr[1]='Matematicas'){
            $s=get_nota($userf,$arr[1]);
        }
    }
?>