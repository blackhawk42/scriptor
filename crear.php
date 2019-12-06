<?php
session_start();

require 'database.php';

$records = $conn-> prepare('SELECT user_id, first_name, last_name, username, email FROM users WHERE user_id=:id');
$records->bindParam(':id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch();

$user = null;

if(count($results) > 0){
	$user = $results;
}

if(!empty($_POST)) {
	$sql = 'INSERT INTO game(author, game_type_id, game_attributes, time_creation) VALUES (?,?,?,?)';
	$stmt = $conn->prepare($sql);

	$json = json_encode(array(
		'texto' => $_POST['texto'],
		'incorrectas' => array($_POST['incorrecta1'], $_POST['incorrecta2'], $_POST['incorrecta3'])
		));

	if( $stmt->execute(array($user['user_id'], 1, $json, date('Y-m-d\TH:i:s'))) ) {
		echo "<script>alert('Exito');</script>";
	}
	else {
		echo "<script>alert('No');</script>";
	}
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
			<li><a href="logout.php">Cerrar sesión</a></li>
			<li><a href="pprofesor.php">Home</a></li>
			<li><a href="crear.php">Nuevo Juego</a></li>
			<li><a href="califs.php">Calificaciones</a></li>
			
		</ul>
	</div>
	<div>
		<h2 align="center">Empecemos creando un juego</h2>
		
			<form name="form" action="crear.php" method="post">
					<table align="center">
						<tr>
							<td>
  							Ingresa el párrafo completo
  							</td>
							<td>
  							<input type="text" name="texto" id="texto" placeholder="Párrafo" required>
  							</td>
  						</tr>
  						<tr>
							<td>
  							Ingresa la primera palabra incorrecta
  							</td>
							<td>
  							<input type="text" name="incorrecta1" id="incorrecta1" placeholder="Palabra incorrecta 1" required>
  							</td>
  						</tr>
  						<tr>
							<td>
  							Ingresa la segunda palabra incorrecta
  							</td>
							<td>
  							<input type="text" name="incorrecta2" id="incorrecta2" placeholder="Palabra incorrecta 2" required>
  							</td>
  						</tr>
  						<tr>
							<td>
  							Ingresa la tercer palabra incorrecta
  							</td>
							<td>
  							<input type="text" name="incorrecta3" id="incorrecta3" placeholder="Palabra incorrecta 3" required>
  							</td>
  						</tr>
  						<tr>
  							<td>
  								
  							</td>
  							<td>
  								<input type="submit" value="Crear" name="submit">
  							</td>
  						</tr>
  					</table>
			</form>
		
	</div>
	<br>
	<div id="cuerpo"> 
		
	</div> 
	<script>
    	var words = $("p").first().text().split( /\s+/ );
		var text = words.join( "</span> <span>" );
		$( "p" ).first().html( "<span>" + text + "</span>" );
		$( "span" ).on( "click", function() {
		$( this ).css( "background-color", "green" );
		console.log($(this).text());
		});
		</script>
 
	
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>


<!-- https://www.w3resource.com/jquery-exercises/2/jquery-fundamental-exercise-67.php -->