<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Scriptor | Mejorado tu ortografía</title>
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
			<li><a href="acercade.html">Acerca de nosotros</a></li>
		</ul>
	</div>
	<!-- "Registro" -->
	<br>
		<h2>Ingrese sus datos:</h2>
		<form action="registro" method="post" required>
			Usuario: <input type="text" name="fname" required><br>
			Contraseña: <input type="password" name="fname" required><br>
			Correo Electrónico: <input type="email" name="fname" required><br>
			Nombre(s): <input type="text" name="fname" required><br>
			Apellido: <input type="text" name="fname" required><br>
			Tipo usuario: <br>
			<input type="radio" name="gender" value="male"> Male<br>
			<input type="radio" name="gender" value="female"> Female<br>
			<input type="submit" value="Registrar">
		</form>
	<br>
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>