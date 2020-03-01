<?php
    function get_datos($id,$name) {
        include '../db/conexion.php';
        $result = pg_query("select * from ".$name."");
        $arr = pg_fetch_all_columns($result, 0);

        echo '
        <div class="accordion" id="accordion_id'.$id.'">
            <div class="card">
            <div class="card-header" id="headingOne" style="background: black;">
            <h2 class="mb-0" style="color:white; font-size:1rem">
            <button id="button_accordion" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_id'.$id.'" aria-expanded="false" aria-controls="collapse_id'.$id.'">
                Tabla '.$name.'
            </button>
            </h2>
           
            </div>
      
            <div id="collapse_id'.$id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_id'.$id.'">
            <div class="card-body table-responsive" id="'.str_replace(' ','',$name).'" style="overflow-x: scroll;">
            <table class="table" style="background: black;color: white;" id="table_skin">
            <thead>
              <tr>
                ';for_columns($name);echo'
              </tr>
            </thead>
            <tbody>
                ';for_datos($name);echo'
            </tbody>
            </table>
            ';buttons($name);echo '
            </div>
            <div class="card-footer" id="button_accordion" style="background: black;color: dodgerblue;">
            N° de registros: <p id="button_accordion" style="margin-bottom:0;color:white" >'.sizeof($arr).'</p>
            </div>
            </div>
            </div>
        </div>
        <br>
        ';
        return '';
    }

    function for_tablas(){
        include '../db/conexion.php';
        $result = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE'");
        $arr = pg_fetch_all_columns($result, 0);
        
        for($y=0; $y<sizeof($arr); $y++){
            get_datos($y,$arr[$y]);
        }
    }

    function for_columns($name){
        include '../db/conexion.php';
        $result = pg_query("SELECT column_name FROM information_schema.columns WHERE table_schema = 'public' AND table_name = '".$name."' ");
        $arr = pg_fetch_all_columns($result, 0);
        
        for($y=0; $y<sizeof($arr); $y++){
            echo '<th scope="col"><center>'.$arr[$y].'</center></th>';
        }
    }

    function for_datos($name){
        include '../db/conexion.php';
        $result = pg_query("select * from ".$name."");

        $arr2 = pg_fetch_all_columns($result, 0);
        for($y=0; $y<sizeof($arr2); $y++){
            $arr = pg_fetch_row($result, $y);
            echo '<tr>';
            for($x=0; $x<sizeof($arr); $x++){
                if($name!='cursos'){
                    echo '<td id="'.$arr[0].'_'.($x+1).'"><center>'.$arr[$x].'</center></td>';
                }else{
                    echo '<td id="'.$arr[0].'_'.($x+1).'_c"><center>'.$arr[$x].'</center></td>';
                }
            }
            echo '<tr>';
        }
    }

    function consultar($name){
        include '../db/conexion.php';
        $pg=pg_query("select * from estudiantes where cod_est=".$name."");
        $pg_array=pg_fetch_row($pg,0);
        echo $name;
    }

    function buttons($name){
        if($name=='estudiantes'){
            echo'
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta_'.str_replace(' ','',$name).'()">Insertar estudiante</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var nom_est = prompt("Ingrese nombre del estudiante",nud);
                            var ape_est = prompt("Ingrese apellido del estudiante",nud);
                            var usu_est = prompt("Ingrese usuario del estudiante",nud);
                            var pass_est = prompt("Ingrese contraseña del estudiante","bdd20200");
                            if(nom_est.length>0 && ape_est.length>0 && usu_est.length>0 && pass_est.length>0){
                                var condition = confirm("¿Estas seguro de insertar a "+nom_est+"?");
                                if(condition){
                                    alert("El estudiante ha sido insertado");
                                    window.location="PHP/insertar_estudiante_admin.php?nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+(ape_est.toLowerCase().charAt(0).toUpperCase() + ape_est.toLowerCase().slice(1))+"&usu_est="+usu_est+"&pass_est="+pass_est+"";
                                }
                            }else{
                                alert("No se ha podido insertar al estudiante, hay campos vacios por favor intentar nuevamente");
                            }
                    }
                </script>
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta2_'.str_replace(' ','',$name).'()">Eliminar estudiante</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta2_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del estudiante a eliminar",nud);
                            if(cod_est.length>0){
                                var condition = confirm("¿Estas seguro de eliminar a "+cod_est+"?");
                                if(condition){
                                    alert("El estudiante ha sido eliminado");
                                    window.location="PHP/eliminar_estudiante_admin.php?cod_est="+cod_est+"";
                                }
                            }else{
                                alert("No se ha podido borrar al estudiante");
                            }
                    }
                </script> 
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta3_'.str_replace(' ','',$name).'()">Modificar estudiante</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta3_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del estudiante a editar",nud);
                            var nom_est = prompt("Ingrese nombre del estudiante",document.getElementById(cod_est+"_2").innerHTML.split("<")[1].substring(7));
                            var ape_est = prompt("Ingrese apellido del estudiante",document.getElementById(cod_est+"_3").innerHTML.split("<")[1].substring(7));
                            var usu_est = prompt("Ingrese usuario del estudiante",document.getElementById(cod_est+"_4").innerHTML.split("<")[1].substring(7));
                            var pass_est = prompt("Ingrese contraseña del estudiante",document.getElementById(cod_est+"_5").innerHTML.split("<")[1].substring(7));
                            window.location="PHP/modificar_estudiante_admin.php?cod_est="+cod_est+"&nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+(ape_est.toLowerCase().charAt(0).toUpperCase() + ape_est.toLowerCase().slice(1))+"&usu_est="+usu_est+"&pass_est="+pass_est+"";
                    }
                </script>                          
            ';
        }else if($name=='docentes'){
            echo'
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta_'.str_replace(' ','',$name).'()">Insertar docente</button>
                ';echo'
                <script type="text/javascript" >
           
                    var currentDirectory = window.location.pathname.split("/").slice(0, -1).join("/");
                    console.log(currentDirectory);
                    function alerta_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var nom_est = prompt("Ingrese nombre del docente",nud);
                            var ape_est = prompt("Ingrese apellido del docente",nud);
                            var usu_est = prompt("Ingrese usuario del docente",nud);
                            var pass_est = prompt("Ingrese contraseña del docente","bdd20200");
                            if(nom_est.length>0 && ape_est.length>0 && usu_est.length>0 && pass_est.length>0){
                                var condition = confirm("¿Estas seguro de insertar a "+nom_est+"?");
                                if(condition){
                                    alert("El docente ha sido insertado");
                                    window.location="PHP/insertar_docente_admin.php?nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+(ape_est.toLowerCase().charAt(0).toUpperCase() + ape_est.toLowerCase().slice(1))+"&usu_est="+usu_est+"&pass_est="+pass_est+"";
                                }
                            }else{
                                alert("No se ha podido insertar al docente, hay campos vacios por favor intentar nuevamente");
                            }
                    }
                </script>
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta2_'.str_replace(' ','',$name).'()">Eliminar docente</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta2_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del docente a eliminar",nud);
                            if(cod_est.length>0){
                                var condition = confirm("¿Estas seguro de eliminar a "+cod_est+"?");
                                if(condition){
                                    alert("El docente ha sido eliminado");
                                    window.location="PHP/eliminar_docente_admin.php?cod_est="+cod_est+"";
                                }
                            }else{
                                alert("No se ha podido borrar al docente");
                            }
                    }
                </script>
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta3_'.str_replace(' ','',$name).'()">Modificar docente</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta3_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del docente a editar",nud);
                            var nom_est = prompt("Ingrese nombre del docente",document.getElementById(cod_est+"_2").innerHTML.split("<")[1].substring(7));
                            var ape_est = prompt("Ingrese apellido del docente",document.getElementById(cod_est+"_3").innerHTML.split("<")[1].substring(7));
                            var usu_est = prompt("Ingrese usuario del docente",document.getElementById(cod_est+"_4").innerHTML.split("<")[1].substring(7));
                            var pass_est = prompt("Ingrese contraseña del docente",document.getElementById(cod_est+"_5").innerHTML.split("<")[1].substring(7));
                            window.location="PHP/modificar_docente_admin.php?cod_est="+cod_est+"&nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+(ape_est.toLowerCase().charAt(0).toUpperCase() + ape_est.toLowerCase().slice(1))+"&usu_est="+usu_est+"&pass_est="+pass_est+"";
                    }
                </script>                             
            ';
        }else if($name=='cursos'){
            echo'
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta_'.str_replace(' ','',$name).'()">Insertar curso</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var nom_est = prompt("Ingrese nombre del curso",nud);
                            var ape_est = prompt("Ingrese semestre del curso",nud);
                            var usu_est = prompt("Ingrese codigo del docente al que pertenece",nud);
                            var pass_est = prompt("Ingrese contraseña del curso","bdd20200");
                            var cred_est = prompt("Ingrese creditos del curso",nud);
                            if(nom_est.length>0 && ape_est.length>0 && usu_est.length>0 && pass_est.length>0 && cred_est.length>0){
                                var condition = confirm("¿Estas seguro de insertar a "+nom_est+"?");
                                if(condition){
                                    alert("El curso ha sido insertado");
                                    window.location="PHP/insertar_curso_admin.php?nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+ape_est+"&usu_est="+usu_est+"&pass_est="+pass_est+"&cred_est="+cred_est+"";
                                }
                            }else{
                                alert("No se ha podido insertar el curso, hay campos vacios por favor intentar nuevamente");
                            }
                    }
                </script>
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta2_'.str_replace(' ','',$name).'()">Eliminar curso</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta2_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del curso a eliminar",nud);
                            if(cod_est.length>0){
                                var condition = confirm("¿Estas seguro de eliminar a "+cod_est+"?");
                                if(condition){
                                    alert("El curso ha sido eliminado");
                                    window.location="PHP/eliminar_curso_admin.php?cod_est="+cod_est+"";
                                }
                            }else{
                                alert("No se ha podido borrar al curso");
                            }
                    }
                </script>
                <button type="button" class="btn btn-primary" style="margin-bottom:1.5%" onclick="alerta3_'.str_replace(' ','',$name).'()">Modificar curso</button>
                ';echo'
                <script type="text/javascript" >
                    function alerta3_'.str_replace(' ','',$name).'(){
                            var nud="";
                            var cod_est = prompt("Ingrese codigo del curso a editar",nud);
                            var nom_est = prompt("Ingrese nombre del curso",document.getElementById(cod_est+"_2_c").innerHTML.split("<")[1].substring(7));
                            var ape_est = prompt("Ingrese semestre del curso",document.getElementById(cod_est+"_3_c").innerHTML.split("<")[1].substring(7));
                            var usu_est = prompt("Ingrese codigo del docente al que pertenece",document.getElementById(cod_est+"_4_c").innerHTML.split("<")[1].substring(7));
                            var pass_est = prompt("Ingrese contraseña del curso",document.getElementById(cod_est+"_5_c").innerHTML.split("<")[1].substring(7));
                            var cred_est = prompt("Ingrese creditos del curso",document.getElementById(cod_est+"_6_c").innerHTML.split("<")[1].substring(7));
                            window.location="PHP/modificar_curso_admin.php?cod_est="+cod_est+"&nom_est="+(nom_est.toLowerCase().charAt(0).toUpperCase() + nom_est.toLowerCase().slice(1))+"&ape_est="+ape_est+"&usu_est="+usu_est+"&pass_est="+pass_est+"&cred_est="+cred_est+"";
                    }
                </script>                           
            ';
        }
    }

?>