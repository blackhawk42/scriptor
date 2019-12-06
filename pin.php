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
			<li><a href="logout.php">Cerrar sesión</a></li>
			<li><a href="palumno.php">Home</a></li>
			<li><a href="pin.php">Nuevo Juego</a></li>
		</ul>
	</div>
	
	<div id="cuerpo"> 
		<form method="POST" action="juegoprueba.php">
			<h2 align="center">Ingrese el pin:</h2>
		<input  type="text" name="game_id" placeholder="PIN" align="center" >
		  	<div align="center">
		  		<input type="submit" value="Enviar">
			</div>

		</form>
	</div> 
 
	
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>