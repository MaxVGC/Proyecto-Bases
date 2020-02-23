<?php
    function get_nota($userf,$curso) {
        include '../db/conexion.php';
        $color='color:green';
        $periodos = pg_query("select cursos_estudiantes.periodo from estudiantes,cursos,cursos_estudiantes where estudiantes.cod_est=cursos_estudiantes.cod_est and cursos_estudiantes.cod_cur=cursos.cod_cur and estudiantes.usu_est='".$userf."' and cursos.nom_cur='".$curso."'");
        $periodos_arr= pg_fetch_all_columns($periodos, 0);
        $result = pg_query("select notas.n_corte,notas.nota,docentes.nom_doc,docentes.ape_doc from estudiantes,cursos,notas,docentes where estudiantes.cod_est=notas.cod_est and notas.cod_cur=cursos.cod_cur and cursos.cod_doc=docentes.cod_doc and estudiantes.usu_est='".$userf."' and cursos.nom_cur='".$curso."'");
        $cortes = pg_fetch_all_columns($result, 0);
        $notas = pg_fetch_all_columns($result, 1);
        $nombres = pg_fetch_row($result, 0);
        if(nota_final($notas,$curso)<3){
            $color='color:red';
        }
        echo '
        <div class="accordion" id="accordion_'.str_replace(' ','',$curso).'">
            <div class="card">
            <div class="card-header" id="headingOne" style="background: black;">
            <h2 class="mb-0" style="color:white; font-size:1rem">
            <button id="button_accordion" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'.str_replace(' ','',$curso).'" aria-expanded="false" aria-controls="collapse_'.str_replace(' ','',$curso).'">
                '.$curso.' ('.$periodos_arr[0].')
            </button>
            </h2>
           
            </div>
      
            <div id="collapse_'.str_replace(' ','',$curso).'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_'.str_replace(' ','',$curso).'">
            <div class="card-body table-responsive" style="overflow-x: scroll;">
            <table class="table" style="background: black;color: white;" id="table_skin">
            <thead>
              <tr>
                ';for_cortes($cortes,$curso);echo'
                <th scope="col"><center>Nota final</center></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                ';for_notas($notas);echo'
                <td style="'.$color.';"><center>'.nota_final($notas,$curso).'</center></td>
              </tr>
            </tbody>
            </table>
            </div>
            <div class="card-footer" id="button_accordion" style="background: black;color: dodgerblue;">
            Profesor: <p id="button_accordion" style="margin-bottom:0;color:white" >'.$nombres[2].' '.$nombres[3].'</p>
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
        $result = pg_query("select cursos.nom_cur from estudiantes,cursos,cursos_estudiantes where estudiantes.cod_est=cursos_estudiantes.cod_est and cursos_estudiantes.cod_cur=cursos.cod_cur and estudiantes.usu_est='".$userf."'");
        $result2 = pg_query("select nom_cur from cursos");

        $arr = pg_fetch_all_columns($result, 0);
        $arr2 = pg_fetch_all_columns($result2, 0);

        for($x=0; $x<sizeof($arr); $x++){
            for($y=0; $y<sizeof($arr2); $y++){
                if($arr[$x]==$arr2[$y]){
                    $s=get_nota($userf,$arr2[$y]);
                }
            }
        }

    }

    function nota_final($nota,$curso){
        include '../db/conexion.php';
        $result = pg_query("select cortes.porcentaje from cursos,cortes where cursos.cod_cur=cortes.cod_cur and cursos.nom_cur='".$curso."'");
        $porcentajes = pg_fetch_all_columns($result, 0);
        $notaf=0;
        for($y=0; $y<sizeof($porcentajes); $y++){
           $notaf=$notaf+($nota[$y]*($porcentajes[$y]/100));
        }
        return $notaf;
    }

    function for_notas($notas){
        for($y=0; $y<sizeof($notas); $y++){
            echo '<td><center>'.$notas[$y].'</center></td>';
        }
    }

    function for_cortes($cortes,$curso){
        $porcentajes = pg_query("select cortes.porcentaje from cursos,cortes where cursos.cod_cur=cortes.cod_cur and cursos.nom_cur='".$curso."'");
        $porcentajes_arr = pg_fetch_all_columns($porcentajes, 0);
        for($y=0; $y<sizeof($cortes); $y++){
            echo '<th scope="col"><center>Corte '.$cortes[$y].' ('.$porcentajes_arr[$y].'%)</center></th>';
        }
    }

    function consultar_cursos($userf){
        include '../db/conexion.php';
        $cursos = pg_query("select cursos.cod_cur,cursos.nom_cur,cursos.creditos,docentes.nom_doc,docentes.ape_doc,cursos.pass_cur from cursos,docentes where cursos.cod_doc=docentes.cod_doc and cursos.cod_cur not in (select cursos_estudiantes.cod_cur from cursos_estudiantes, estudiantes where cursos_estudiantes.cod_est=estudiantes.cod_est and estudiantes.usu_est='".$userf."')");
        $cod_cur_arr = pg_fetch_all_columns($cursos, 0);
        $nom_cur_arr = pg_fetch_all_columns($cursos, 1);
        $creditos_arr = pg_fetch_all_columns($cursos, 2);
        $nombre_arr = pg_fetch_all_columns($cursos, 3);
        $apellido_arr = pg_fetch_all_columns($cursos, 4);
        $pass_arr = pg_fetch_all_columns($cursos, 5);
        for($y=0; $y<sizeof($cod_cur_arr); $y++){
        echo '
        <div class="accordion" id="accordion_'.str_replace(' ','',$nom_cur_arr[$y]).'">
            <div class="card">
            <div class="card-header" id="headingOne" style="background: black;">
            <h2 class="mb-0" style="color:white; font-size:1rem">
            <button id="button_accordion" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_'.str_replace(' ','',$nom_cur_arr[$y]).'" aria-expanded="false" aria-controls="collapse_'.str_replace(' ','',$nom_cur_arr[$y]).'">
                '.$nom_cur_arr[$y].'
            </button>
            </h2>
           
            </div>
      
            <div id="collapse_'.str_replace(' ','',$nom_cur_arr[$y]).'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_'.str_replace(' ','',$nom_cur_arr[$y]).'">
            <div class="card-body" style="overflow-x: scroll;">
            <label style="margin-top: 4%">Creditos: '.$creditos_arr[$y].'</label>
            <button type="button" class="btn btn-primary" style="margin-left: 75%;" onclick="alerta_'.str_replace(' ','',$nom_cur_arr[$y]).'()">Registrarse</button>';
            echo'
                <script type="text/javascript" >
                    function alerta_'.str_replace(' ','',$nom_cur_arr[$y]).'(){
                        var pass = prompt("Ingrese contraseña del curso para inscribirse");
                        if(pass=="'.$pass_arr[$y].'"){
                            var condition = confirm("¿Estas seguro de inscribirte a '.$nom_cur_arr[$y].'? una vez hecho ya no podras retirarte del curso solo el profesor podra hacerlo");
                            if(condition){
                                alert("Te has inscrito correctamente");
                                window.location="../view/PHP/inscribir_materia.php?user='.$userf.'&cur='.$cod_cur_arr[$y].'";
                            }
                        }else if(pass=="" || pass==null){
                            alert("Por favor ingresar contraseña");
                        }else{
                            alert("Contraseña invalida");
                        }
                    }
	            </script>
            ';
            echo'</div>
            <div class="card-footer" id="button_accordion" style="background: black;color: dodgerblue;">
            Profesor: <p id="button_accordion" style="margin-bottom:0;color:white" >'.$nombre_arr[$y].' '.$apellido_arr[$y].'</p>
            </div>
            </div>
            </div>
        </div>
        <br>
        ';
        }
    }
?>