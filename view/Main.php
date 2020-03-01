<?php 
    include '../db/conexion.php';
    #hola
    $userf=$_POST["user"];
    $passf=$_POST["pass"];	
	  $result = pg_query("select * from docentes where usu_doc='".$userf."' union select * from estudiantes where usu_est='".$userf."'");
    $arr = pg_fetch_array($result, 0);
    if(!empty($userf) && !empty($passf)){
      if($userf==$arr[3] && $passf==$arr[4]){
        if(substr($arr[0], 0, 2)==16){
          $mensaje = base64_encode($userf);
          header("Location: Estudiante.php?user=$mensaje");
        }else if(substr($arr[0], 0, 2)==10){
          $mensaje = base64_encode($userf);
          header("Location: Admin.php?user=$mensaje");
        }else{
          $mensaje = base64_encode($userf);
          header("Location: Profesor.php?user=$mensaje");
        }
      }else if(!empty($arr[3]) && !empty($arr[4])){
        echo '<script language="javascript">';
        echo 'alert("El usuario no existe")';
        echo '</script>';
        echo '<script language="javascript">';
        echo 'window.location="../view/Index.php"';
        echo '</script>';
      }else{
        echo '<script language="javascript">';
        echo 'alert("Contraseña o Usuario incorrectos")';
        echo '</script>';
        echo '<script language="javascript">';
        echo 'window.location="../view/Index.php"';
        echo '</script>';
      }
	  }
	
?>