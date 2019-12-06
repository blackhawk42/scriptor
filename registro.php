<?php
	require 'database.php';

	$message = '';

	if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['correo']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['tipoUsuario'])){
		$sql = "INSERT INTO users(username, contrasena, email, first_name, last_name, user_type_id) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $_POST['usuario']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(2, $password);
		$stmt->bindParam(3, $_POST['correo']);
		$stmt->bindParam(4, $_POST['nombre']);
		$stmt->bindParam(5, $_POST['apellido']);
		$stmt->bindParam(6, $_POST['tipoUsuario']);

		if($stmt->execute()){
			$message = '<script>alert("Usuario creado satisfactoriamente");</script>';
		} else{
			$message = '<script>alert("Ha ocurrrido un error");</script>';
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Scriptor | Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/index.css">
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

		<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
		<?php endif; ?>

		<h2 align="center">Ingrese sus datos:</h2>
		<form action="registro.php" method="post" required align="center">
			Usuario:<input type="text" name="usuario" placeholder="Usuario" required><br>
			Contraseña: <input type="password" name="password" placeholder="Contraseña" required><br>
			Correo Electrónico: <input type="text" name="correo" placeholder="Correo Electrónico" required><br>
			Nombre(s): <input type="text" name="nombre" placeholder="Nombres(s)" required><br>
			Apellido: <input type="text" name="apellido" placeholder="Apellido" required><br>
			Tipo usuario: <br>
			<input type="radio" name="tipoUsuario" value=1> Alumno<br>
			<input type="radio" name="tipoUsuario" value=2> Maestro<br><br>

			<input type="submit" value="Registrar"><br>
			<span align="center">o <a href="login.php"> Ingresa con tu cuenta</a></span>
		</form>
	<br>
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>