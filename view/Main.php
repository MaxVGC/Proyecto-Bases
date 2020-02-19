<?php 
    include '../db/conexion.php';
    #hola
    $userf=$_POST["user"];
    $passf=$_POST["pass"];	
	  $result = pg_query("select * from profesores where usuario='".$userf."' union select * from estudiantes where usuario='".$userf."'");
    $arr = pg_fetch_array($result, 0);
    if(!empty($userf) && !empty($passf)){
    if($userf==$arr[3] && $passf==$arr[4]){
		if($arr[5]==1){
			$mensaje = base64_encode($userf);
			header("Location: Estudiante.php?user=$mensaje");
		}else{
			$mensaje = base64_encode($userf);
			header("Location: Profesor.php?user=$mensaje");
		}
    }else{
        echo '<script language="javascript">';
        echo 'alert("Contraseña o Usuario incorrectos")';
        echo '</script>';
        echo '<script language="javascript">';
        echo 'window.location="../view/index.php"';
        echo '</script>';
    
	}
	
	}
	
?>
