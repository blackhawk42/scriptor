<?php
session_start();

require 'database.php';

$records = $conn-> prepare('SELECT first_name FROM users WHERE user_id=:id');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch();

$user = null;

if(count($results) > 0){
	$user = $results;
}

?>
	
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Scriptor | Mejorado tu ortografía</title>
    <link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/perfiles.css">
    <script src="script.js"></script>
  </head>
  <body>
	<!-- Menú -->
	<div>
		<ul>
			<li><img src="img/logo.png" alt="logo" width = "" height="20"></li>
			<li><a href="index.php">Cerrar sesión</a></li>
			<li><a href="palumno.php">Home</a></li>
			<li><a href="pin.php">Nuevo Juego</a></li>
		</ul>
	</div>
	<br><br>
	
	<div id="cuerpo"> 
		<div id="lateral"> 
			<img src="img/profile.png">
			<p>Bio</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum ligula non purus gravida volutpat. Donec nec dui sit amet tortor dignissim efficitur.  Duis a lectus non ex aliquet lacinia a nec libero. Proin hendrerit tempor eros, eu ornare lacus gravida sed. Phasellus sed condimentum tellus. Ut eleifend justo diam, at blandit velit finibus sed. Cras lacinia lectus a mattis iaculis. </p>
		</div> 
		<div id="principal"> 

			<br><br>
			<h1>Bienvenido <?= $user['first_name']?>, </h1> 
			<br><br><br>
			
			<h2>Informacion personal</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum ligula non purus gravida volutpat. Donec nec dui sit amet tortor dignissim efficitur. Duis a lectus non ex aliquet lacinia a nec libero. Proin hendrerit tempor eros, eu ornare lacus gravida sed. Phasellus sed condimentum tellus. Ut eleifend justo diam, at blandit velit finibus sed. Cras lacinia lectus a mattis iaculis. Duis odio massa, rhoncus et lectus at, interdum finibus risus. Donec ac sapien efficitur, bibendum tortor nec, pellentesque orci. Quisque ut lobortis lacus. Sed vel massa eu augue pretium consequat. Ut mattis nibh eget ultrices sollicitudin. Nulla semper, justo sed consectetur scelerisque, dolor eros tincidunt magna, vitae gravida quam enim sit amet risus. Donec posuere diam vel quam consectetur iaculis.</p>

		</div> 
	</div> 
 
	
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>