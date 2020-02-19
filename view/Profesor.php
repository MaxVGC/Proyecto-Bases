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
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
        </ul>
    </div>
    <div id="navbar2">
        <nav class="navbar navbar-expand navbar-dark" style="background-color:black">
            <div class="toggle-btn">
                <span>&#9776</span>
            </div>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                </ul>
                <img src="Images/Icon_User.png" width="30px" style="margin-right:1%">
                <a href="#" class="navbar-brand" style="margin-right: 0rem; font-size: 100%;"><?php echo $mensaje?></a>
            </div>
        </nav>
    </div>
    <script src="Js/Main_js.js"></script>
    <div id="div_prueba">

    </div>
    </div>
</body>


</html>