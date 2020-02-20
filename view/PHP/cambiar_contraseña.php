<?php 
    include '../../db/conexion.php';
    $user=$_GET["user"];
    $pass1=$_POST["pass_actual"];
    $pass2=$_POST["pass_nueva"];	
    $pass3=$_POST["pass_nueva2"];
    
    $result=pg_query("select pass_est from estudiantes where usu_est='".$user."'");
    $arr = pg_fetch_array($result, 0);
    if($arr[0]==$pass1){
        if($pass2==$pass3){
            $success=pg_query("UPDATE estudiantes SET pass_est = '".$pass2."' WHERE usu_est = '".$user."'");
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
    
    
    
    

    
?>