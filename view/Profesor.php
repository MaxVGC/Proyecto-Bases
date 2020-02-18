<?
        $mensaje=$_GET["mensaje"];
        echo '<script language="javascript">';
        echo 'alert("Bienvenido "+"'.$mensaje.'");';  
		echo '</script>';
?>
<html>
<head>
    <title>InicioP</title>
    <link rel="stylesheet" type="text/css" href="Css/Main_leaf.css" media="screen" />
    <link rel="icon" type="image/png" href="Images/logo1.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://unpkg.com/react/umd/react.production.min.js" crossorigin></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/react-dom/umd/react-dom.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js" crossorigin></script>
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
    <div class="col" id="div_prueba">

    </div>
    </div>
</body>


</html>