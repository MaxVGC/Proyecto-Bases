<?php
        $recibed=$_GET["user"];
        $mensaje = base64_decode($recibed);
        echo '<script language="javascript">';
        echo 'alert("Bienvenido "+"'.$mensaje.'");';  
		echo '</script>';
?>
<html>

<head>
    <title>InicioP</title>
    <link rel="icon" type="image/png" href="Images/logo1.png" />
    <link rel="stylesheet" type="text/css" href="Css/main_leaf.css" media="screen" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <link href="Css/bootstrap.css" rel="stylesheet" />
    <link href="Css/bootstrap-theme.css" rel="stylesheet" />
    <script src="Js/jquery-3.4.1.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="width: 100%;"></div>
    <div id="sidebar">
        <ul>
            <li>
                <img src="Images/logo1.png" alt="Logo Fazt" class="logo">
            </li>
            <li><a id="links_estudiante" href="Profesor.php?user=<?php echo $recibed; ?>">Inicio</a></li>
            <li><a id="links_estudiante" href="Profesor_cursos.php?user=<?php echo $recibed; ?>">Cursos</a></li>
        </ul>
        <div class="site-footer">
            <label id="F2" style="color:dodgerblue">
                <center>©2020 Todos los derechos reservados Grupo AOH</center>
            </label>
        </div>
    </div>
    <div id="navbar2">
    <nav class="navbar navbar-expand navbar-dark" style="background-color:black;padding-bottom: 0.4%;">
            <div class="toggle-btn">
                <span>&#9776</span>
            </div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                </ul>
                <img src="Images/Icon_User.png" width="30px">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" id="btn_user"><?php echo $mensaje; ?></button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="background:dodgerblue;border:0">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" style="left:-73%;top:120%">
                        <div class="toggle-div-pass">
                            <center><span>Cambiar contraseña</span></center>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php" style="text-align: center">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script src="Js/main_js.js"></script>
    <div style="width:100%;height:92.5%;">
        <div id="div_notas" style="position: absolute;overflow-y: hidden">
            <img src="Images/image.jpg" id="img_tp">
        </div>
        <div id="div_pass" style="position: absolute;">
        <form name="login" class="" method="post" autocomplete="off" action="PHP/cambiar_contraseña.php?user=<?php echo $mensaje ?>">
                <div class="form-group">
                    <label for="formGroupExampleInput">Contraseña actual</label>
                    <input type="password"  name="pass_actual" class="form-control" id="formGroupExampleInput" placeholder="" style="width:50%">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Nueva contraseña</label>
                    <input type="password"  name="pass_nueva" class="form-control" id="formGroupExampleInput2" placeholder=""
                        style="width:50%">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Repetir nueva contraseña</label>
                    <input type="password"  name="pass_nueva2" class="form-control" id="formGroupExampleInput2" placeholder=""
                        style="width:50%">
                </div>
                <input type="submit" name="" value="Buscar" id="boton1" onclick="funcion();">

            </form>
        </div>
    </div>
</body>


</html>