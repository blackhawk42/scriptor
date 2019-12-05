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
			
		</ul>
	</div>
	
	<div id="cuerpo"> 
		<h2 align="center"><p>
			This domain is established to be used for illustrative examples in documents. You may use this domain in examples without prior coordination or asking for permission.
		</p></h2>
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