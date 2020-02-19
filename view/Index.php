
<html>

<head>
	<title>SONU-Sistema Organizado de Notas Universitario</title>
	<link rel="stylesheet" type="text/css" href="Css/Index_leaf.css" media="screen" />
	<link rel="icon" type="image/png" href="Images/logo1.png" />
	<link href="Css/bootstrap.css" rel="stylesheet" />
    <link href="Css/bootstrap-theme.css" rel="stylesheet" />
    <script src="Js/jquery-3.4.1.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>

</head>

<body>
	<nav class="navbar navbar-expand navbar-dark" style="background-color:black">
		<img alt="" src="Images/logo1.png" height="40" class="d-inline-block align-top">
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			</ul>
			<a href="#" class="navbar-brand" style="margin-right: 0rem;">Sistema organizado de notas universitario</a>
		</div>
	</nav>
	<div class="container" style="width: 100%;">
		<div class="row" style="width: 100%;">
			<div class="col-4">
				<center><img src="Images/Login.png" id="login" height="40px"></center>
				<form name="login" class="" method="post" autocomplete="off" action="Main.php" >
					<div class="form-group">
						<center><label class="form-label" id="F2">Usuario</label></center>
						<div class="input-group-prepend">
							<img src="Images/Icon_User.png" id="icon_user">
							<input placeholder="Ingrese usuario" name="user" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<center><label class="form-label" id="F2" for="formBasicPassword">Contraseña</label></center>
						<div class="input-group-prepend">
							<img src="Images/Icon_Pass.png" id="icon_user">
							<input placeholder="Contraseña" name="pass" type="password" id="formBasicPassword"
								class="form-control">
						</div>
					</div>
					<center><input type="submit" id="btn_login" name="btn_login" value="Ingresar"></center>
				</form>
			</div>
			<div class="col">
				<div id="content">
					<div id="d2">
						<img src="Images/image2.png" id="img_tp">
						<div>
							<img class="top" src="Images/image.jpg" id="img_tp">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-footer">
		<label id="F2" style="color:dodgerblue">
			<center>©2020 Todos los derechos reservados Grupo AOH</center>
		</label>
	</div>
</body>

</html>

