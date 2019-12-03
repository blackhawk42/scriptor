<?php
	
	session_start();

	require 'database.php';
	
	if(!empty($_POST['usuario']) && !empty($_POST['password'])){
		$records=$conn->prepare('SELECT user_id, username, contrasena, user_type_id FROM users WHERE username=?');
		$records->execute([$_POST['usuario']]);
		$total_records = $records->rowcount();
		$results = $records->fetch();
		
		$message='';
		
	
		if($total_records > 0 && password_verify($_POST['password'], $results['contrasena'])){
			$_SESSION['user_id'] = $results['user_id'];
			if($results['user_type_id'] == 1){
			header('Location: /scriptor/palumno.php');
			} else{
				header('Location: /scriptor/pprofesor.php');
			}
			
		} else {
			$message = '<script>alert("Lo sentimos, las credenciales no coinciden");</script>';
		}
	}
?>

<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Scriptor | Login</title>
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
	<h2 align="center">Iniciar sesión</h2>

	<?php if (!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif;?>

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