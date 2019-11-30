<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Scriptor | Login</title>
	<link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="script.js"></script>
</head>
<body>
	<!-- Menú -->
	<div>
		<ul>
			<li><a href="index.php"><img src="img/logo.png" alt="logo" width = "" height="20"></a></li>
			<li><a href="index.php">Scriptor</a></li>
			<li><a href="registro.php">Regístrese</a></li>
			<li><a href="login.php">Ingrese</a></li>
			<li><a href="acercade.php">Acerca de nosotros</a></li>
		</ul>
	</div>
	<!-- "Registro" -->
	<br>
	<h2 align="center">Iniciar sesión</h2>
	<form action="login.php" method="post" align="center" required >
		<input  type="text" name="usuario" placeholder="Nombre de usuario" >
		<input  type="password" name="password" placeholder="Contrasenia">
		<input  type="submit" value="Enviar"><br>
		<span align="center">o <a href="registro.php"> Registrate</a></span>
	</form>
	<br>
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
</body>
</html>