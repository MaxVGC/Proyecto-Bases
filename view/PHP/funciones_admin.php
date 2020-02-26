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
            <div class="card-body table-responsive" style="overflow-x: scroll;">
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
                echo '<td><center>'.$arr[$x].'</center></td>';
            }
            echo '<tr>';
        }
    }

    function insert_registros($user,$pg){
        $pg= pg_query("insert into registros values(default,'".$user."','".date("d-m-Y")."','".date("H:i:s")."','".$pg."')");
    }


?>