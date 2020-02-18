
<html>

<head>
	<title>SONU-Sistema Organizado de Notas Universitario</title>
	<link rel="stylesheet" type="text/css" href="Css/Index_leaf.css" media="screen" />
	<link rel="icon" type="image/png" href="Images/logo1.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://unpkg.com/react/umd/react.production.min.js" crossorigin></script>

	<script src="https://unpkg.com/react-dom/umd/react-dom.production.min.js" crossorigin></script>
	<script src="https://unpkg.com/react-bootstrap@next/dist/react-bootstrap.min.js" crossorigin></script>

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

