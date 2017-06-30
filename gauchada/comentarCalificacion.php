<?php
	$id = $_GET['id'];
	$puntaje = $_GET['puntaje'];
	$idPostulacion = $_GET['idPostulacion'];
	$calificacion= $_GET['calificacion'];
	
	?>
			<link rel="stylesheet" type="text/css" href="css/estilos.css">
			<form name="formulario2" action="actualizarPuntaje.php" class="login-form" method="post">
			 
				<div class="header">
				   <h1>Por qué calificaste así?</h1>
				</div>
			 
				<div class="content">
					<label for="coment">Dejá tu comentario:</label>
					<textarea type="input" maxlength="160" rows="10" name="coment" class="input"  required="required" size=25></textarea></br></br>
					<input type="hidden" name="idUsuario" value=<?php echo "$id"; ?> >
					<input type="hidden" name="idPostulacion" value= <?php echo "$idPostulacion"; ?> >
					<input type="hidden" name="puntaje" value= <?php echo "$puntaje"; ?> >
					<input type="hidden" name="calificacion" value= <?php echo "$calificacion"; ?> >
				</div>
				
				<div class="footer">
				   <input type="submit" name="comentar" value="Comentar" class="button" />
				</div>
			
			</form>
