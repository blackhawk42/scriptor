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

$sql = 'SELECT game_attributes FROM game WHERE game_id = ?';
$stmt = $conn->prepare($sql);

if( !$stmt->execute(array($_POST['game_id'])) ){
	echo 'echo <script>alert("No");</script>';
}

$json = $stmt->fetch()['game_attributes'];
$game_attributes = json_decode($json);

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel = "stylesheet" href = "css/estilo.css">

<title>Scriptor | Mejorado tu ortografía</title>
</head>
<body>
	<!-- Menú -->
	<div>
		<ul>
			<li><img src="img/logo.png" alt="logo" width = "" height="20"></li>
		</ul>
	</div>




<div><font color=black><h1 align="center">Da click en las 3 palabras que consideres incorrectas</h1></font></div>
<div><h2 align="center">
	<p>
		<?php echo $game_attributes->texto; ?>
	</p>
	</h2>
</div>
<div align="center">
	<img src="img/inspector.png" width="300" height="">
	<br><br>
</div>



<form id="form-puntaje" action="palumno.php" method="post" align="center">
  <input type="hidden" name="puntaje" value="0">
  <input type="hidden" name="game_id" value=<?php echo "\"" . $_POST['game_id'] . "\"" ?>>
  <input type="hidden" name="time_start" value=<?php echo "\"" . date('Y-m-d\TH:i:s') . "\"" ?>>
  <input type="submit" value="Enviar" name="submit" >
</form>
<br><br>

<br><br>




</body>

<script>
	function is_in(str, array) {
		for(var i = 0; i < array.length; i++) {
			if(str == array[i]) {
				return true;
			}
		}

		return false;
	}

	var form = document.getElementById('form-puntaje');

	var incorrectas = <?php echo "['" . implode("', '", $game_attributes->incorrectas) . "'];"; ?>
	var incorrectas_totales = incorrectas.length;

    var words = $( "p" ).first().text().split( /\s+/ );
	var text = words.join( "</span> <span>" );
	var intentos = 0;
	var score = 0;
	var times_correct = 0;

	$( "p" ).first().html( "<span>" + text + "</span>" );
	$( "span" ).on( "click", function() {
		$( this ).css( "background-color", "orange" );
		var prueba = $(this).text().match(/[A-Za-z]*/)[0];
		console.log(prueba);

		intentos += 1;
		
		if(is_in(prueba, incorrectas)) {
			times_correct += 1;
			incorrectas = incorrectas.filter(function(val) {return prueba != val;});
			console.log(incorrectas);
			
			if (times_correct == incorrectas_totales) {
					score = 130-intentos*10;
					form.puntaje.value = score;
					alert('	Ha ganado en '+intentos.toString()+' intentos, su score es: ' + score.toString());
			}

			console.log(times_correct);
		}
		else if(intentos > 10){
			score = 0;
			form.puntaje.value = score;
			alert('Ha perdido, su score es: 0');
		}

		else {
			console.log('incorrecto, ya lleva '+intentos.toString()+' intentos');
		}
	});
</script>
<div class="footer">
		Scriptor - 2019. <br>
	</div>

</html>

<!-- https://www.w3resource.com/jquery-exercises/2/jquery-fundamental-exercise-67.php -->