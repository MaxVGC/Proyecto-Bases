<?php
    function get_nota($userf,$curso) {
        include '../db/conexion.php';
        $color='color:green';
        $result = pg_query("select cursos.nombre,notas.corte_1,notas.corte_2,notas.corte_3,profesores.nombre,profesores.apellido from notas,estudiantes,cursos,profesores where estudiantes.codigo=notas.cod_est and cursos.cod_prof=profesores.codigo and notas.cod_cur=cursos.id and estudiantes.usuario='".$userf."' and cursos.nombre='".$curso."'");
        $arr = pg_fetch_array($result, 0);
        if(nota_final($arr[1],$arr[2],$arr[3])<3){
            $color='color:red';
        }
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
            <div class="card-body">
            <table class="table" style="background: black;color: white;" id="table_skin">
            <thead>
              <tr>
                <th scope="col"><center>Corte 1</center></th>
                <th scope="col"><center>Corte 2</center></th>
                <th scope="col"><center>Corte 3</center></th>
                <th scope="col"><center>Nota final</center></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><center>'.$arr[1].'</center></td>
                <td><center>'.$arr[2].'</center></td>
                <td><center>'.$arr[3].'</center></td>
                <td style="'.$color.';"><center>'.nota_final($arr[1],$arr[2],$arr[3]).'</center></td>
              </tr>
            </tbody>
            </table>
            </div>
            <div class="card-footer" id="button_accordion" style="background: black;color: dodgerblue;">
            Profesor: <p id="button_accordion" style="margin-bottom:0;color:white" >'.$arr[4].' '.$arr[5].'</p>
            </div>
            </div>
            </div>
        </div>
        <br>
        ';
        return '';
    }
    
    function div_notas($userf){
        include '../db/conexion.php';
        $result = pg_query("select cursos.nombre from notas,estudiantes,cursos where notas.cod_est=estudiantes.codigo and notas.cod_cur=cursos.id and estudiantes.usuario='".$userf."'");
        $result2 = pg_query("select nombre from cursos");

        $arr = pg_fetch_all_columns($result, 0);
        $arr2 = pg_fetch_all_columns($result2, 0);

        for($x=0; $x<sizeof($arr); $x++){
            for($y=0; $y<sizeof($arr2); $y++){
                if($arr[$x]==$arr2[$y]){
                    $s=get_nota($userf,$arr[$y]);
                }
            }
        }

    }

    function nota_final($a,$b,$c){
        $result=($a*0.3)+($b*0.3)+($c*0.4);
        return $result;
    }

    function cambiar_pass($userf,$pass){
        include '../db/conexion.php';
        $result = pg_query("select cursos.nombre from notas,estudiantes,cursos where notas.cod_est=estudiantes.codigo and notas.cod_cur=cursos.id and estudiantes.usuario='".$userf."'");

    }
?>