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
	<h1 style="background-color:hsl(0, 100%, 0%);">Bienvenido <?= $user['first_name']?>, </h1> 
	
	<div id="cuerpo"> 
		<div id="lateral"> 
			<img src="img/deportivo.jpg" width="" height="200">
		</div> 
		
		<br><br><br><br><br><br><br><br><br><br><br>
		
		
			<div id="principal"> 
			
				<h2><font color="black">Informacion personal</font></h2>
				
				<p>Nombre: <?= $user['first_name']?> <?= $user['last_name']?></p>
				<p>Username: <?= $user['username']?> </p>
				<p>Email: <?= $user['email']?> </p>	
			
			</div> 


	</div> 

	<br>
	<h2><font color="black">Juegos creados</font></h2>

	<div>
		<?php
			require 'database.php';

			$sql = "SELECT * FROM game WHERE author = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute(array($user['user_id']));
			$games = $stmt->fetchAll();
		?>
		<font color="white">
		<table  class="w3-table-all w3-xlarge">
			<tr>
				<th>PIN</th>
				<th>Tiempo de creación</th>
			</tr>
			<?php
				foreach ($games as $game) {
					echo "<tr>";
					echo "<td>" . $game['game_id'] . "</td>";
					echo "<td align='center'>" . $game['time_creation'] . "</td>";
 					echo "</tr>";
 				}
			?>

		</table>
		</font>
		
				
	</div>
 
	
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>