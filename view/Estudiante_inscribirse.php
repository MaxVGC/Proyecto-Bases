<?php
        $recibed=$_GET["user"];
        $mensaje = base64_decode($recibed);
        echo '<script language="javascript">';
        echo '</script>';
        include 'PHP/funciones_estudiante.php';
?>
<html>

<head>
    <title>InicioE</title>
    <link rel="icon" type="image/png" href="Images/logo1.png" />
    <link rel="stylesheet" type="text/css" href="Css/Main_leaf.css" media="screen" />
    <link href="Css/bootstrap.css" rel="stylesheet" />
    <link href="Css/bootstrap-theme.css" rel="stylesheet" />
    <script src="Js/jquery-3.4.1.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
</head>

<body>
    <div class="container" style="width: 100%;"></div>
    <div id="sidebar">
        <ul>
            <li>
                <img src="Images/logo1.png" alt="Logo Fazt" class="logo">
            </li>
            <li><a id="links_estudiante" href="Estudiante.php?user=<?php echo $recibed; ?>">Inicio</a></li>
            <li><a id="links_estudiante" href="Estudiante_notas.php?user=<?php echo $recibed; ?>">Notas</a></li>
            <li><a id="links_estudiante" href="Estudiante_inscribirse.php?user=<?php echo $recibed; ?>">Inscribirse</a></li>
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
                        <a class="dropdown-item" href="Index.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="div_notas">
        <div id="div_notas_container">
            <?php
                $notas=consultar_cursos($mensaje);
            ?>
        </div>
    </div>

    <div id="div_pass" style="position: absolute;">
        <form name="login" class="" method="post" autocomplete="off"
            action="PHP/cambiar_contraseña.php?user=<?php echo $mensaje ?>">
            <div class="form-group">
                <label for="formGroupExampleInput">Contraseña actual</label>
                <input type="password" min="8" name="pass_actual" class="form-control" id="formGroupExampleInput"
                    placeholder="" style="width:50%" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Nueva contraseña</label>
                <input type="password" min="8" name="pass_nueva" class="form-control" id="formGroupExampleInput2"
                    placeholder="" style="width:50%" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Repetir nueva contraseña</label>
                <input type="password" min="8" name="pass_nueva2" class="form-control" id="formGroupExampleInput3"
                    placeholder="" style="width:50%" required>
            </div>
            <input type="submit" name="" value="Cambiar contraseña" id="boton1" onclick="funcion();">

        </form>
    </div>
    <script src="Js/Main_js.js"></script>

</body>


</html>