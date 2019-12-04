<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel = "stylesheet" href = "css/estilo.css">

<title>Juego de Prueba.</title>
</head>
<body>
<div><h2>Elige la palabra incorrecta<h2></div>
<div>
	<p>
		Un león que vagaba por el bosque se clavó una espina en la pata, y al encontrar un pastor, le pidió que se la extranjera. El pastor lo hizo, y el león, que estaba saciado porque acababa de devorar a otro pastor, siguió su camino sin hacerle daño. Algún tiempo después, el pastor fue condenado, a causa de una falsa acusación, a ser arrojado a los leones en el anfiteatro. Cuando las fieras estaban por devorarlo, una de ellas dijo:
		— Este es el hombre que me saco la espina de la pata.
		Al oír esto, los otros leones honorablemente se abstuvieron, y el que habló se comió él solo al Pastor.
	</p>
</div>
<script>
    var words = $( "p" ).first().text().split( /\s+/ );
	var text = words.join( "</span> <span>" );
	var intentos = 0;
	var score = 0;
	$( "p" ).first().html( "<span>" + text + "</span>" );
	$( "span" ).on( "click", function() {
	$( this ).css( "background-color", "orange" );
	var prueba = $(this).text();
	console.log(prueba);
		
		if(prueba == 'saco'){
			intentos = intentos + 1;
			
			if(intentos > 10){
				score = 0;
				console.log('Ha perdido, su score es: 0');
			}else{
				score = 110-intentos*10;
				
				alert('ha ganado en '+intentos.toString()+' intentos, su score es: ' + score.toString());
			}
		}else{
			intentos = intentos + 1;
			console.log('incorrecto, ya lleva '+intentos.toString()+' intentos');
			
			if(intentos > 10){
				score = 0;
				console.log('Ha perdido, su score es: 0');
			}
		}

		var elem = document.getElementById('subject');
   		elem.value = score;
	});
</script>



<br><br>



<form name="form" action="juegoprueba.php" method="post">
  <input type="hidden" name="dato" id="subject" value="0">
  <input type="submit" value="Enviar" name="submit">
</form>
<br><br>

<?php 


if(isset($_POST['submit']))
{
	$score = $_POST['dato'];
	echo(htmlspecialchars("Score del juego desde php: ".$score));

	//aqui ya se puede mandar el score a la BD.
} 

?>

<br><br>




</body>
</html>

<!-- https://www.w3resource.com/jquery-exercises/2/jquery-fundamental-exercise-67.php -->