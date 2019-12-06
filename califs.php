<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Scriptor | Mejorado tu ortografía</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
		<br><br>

		
		<?php
			require 'database.php';

			$sql = "SELECT * FROM game_session_record";
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			$califs = $stmt->fetchAll();

			$sql = "SELECT * FROM users WHERE user_id = ?";
			$stmt = $conn->prepare($sql);
		?>
		<font color="black">
		<table align="center" class="w3-table-all w3-xlarge">
			<tr>
				<th>Estudiante</th>
				<th>Caificación</th>
			</tr>
			<?php
				foreach ($califs as $row) {
					echo "<tr>";
					$stmt->execute(array($row['user_id']));
					$result = $stmt->fetch();

					echo "<td>" . $result['first_name'] . " " . $result['last_name'] . "</td>";
					echo "<td align='center'>" . $row['incorrect_answers'] . "</td>";
 					echo "</tr>";
 				}
			?>

		</table>
		</font>
				
	</div>
	
 
	<br><br>
	<!--Footer-->
	<div class="footer">
		Scriptor - 2019. <br>
	</div>
  </body>
</html>


<!-- https://www.w3resource.com/jquery-exercises/2/jquery-fundamental-exercise-67.php -->