<?php 
    include '../../db/conexion.php';
    $user=$_GET["user"];
    $pass1=$_POST["pass_actual"];
    $pass2=$_POST["pass_nueva"];	
    $pass3=$_POST["pass_nueva2"];
    $result = pg_query("select cod_doc,pass_doc from docentes where usu_doc='".$user."' union select cod_est,pass_est from estudiantes where usu_est='".$user."'");
    $arr = pg_fetch_array($result, 0);
    if(substr($arr[0], 0, 2)==16){
        if($arr[1]==$pass1){
            if($pass2==$pass3){
                $query="UPDATE estudiantes SET pass_est = '".$pass2."' WHERE usu_est = '".$user."'";
                $success=pg_query($query);
                $pg= pg_query("insert into registros values(default,'".$user."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
                echo '<script language="javascript">';
                echo 'alert("La contraseña ha sido cambiada satisfactoriamente");';
                echo "window.history.back(-1);";
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("La contraseñas no coinciden, Por favor intentalo nuevamente");';
                echo "window.history.back(-1);";
                echo '</script>';
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("La contraseña ingresada no es valida, Por favor intentalo nuevamente");';
            echo "window.history.back(-1);";
            echo '</script>';
        }
    }else{
        if($arr[1]==$pass1){
            if($pass2==$pass3){
                $query="UPDATE docentes SET pass_doc = '".$pass2."' WHERE usu_doc = '".$user."'";
                $success=pg_query($query);
                $pg= pg_query("insert into registros values(default,'".$user."','".date("d-m-Y")."','".date("h:i:s a")."','".str_replace("'",'',$query)."')");
                echo '<script language="javascript">';
                echo 'alert("La contraseña ha sido cambiada satisfactoriamente");';
                echo "window.history.back(-1);";
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'alert("La contraseñas no coinciden, Por favor intentalo nuevamente");';
                echo "window.history.back(-1);";
                echo '</script>';
            }
        }else{
            echo '<script language="javascript">';
            echo 'alert("La contraseña ingresada no es valida, Por favor intentalo nuevamente");';
            echo "window.history.back(-1);";
            echo '</script>';
        }
    }
    
    
    

    
?>