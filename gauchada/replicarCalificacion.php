<?php
	
	$idPostulacion=$_GET['idPostulacion'];
	
?>

		<link rel="stylesheet" type="text/css" href="css/estilos.css">
			<form name="formulario2" action="actualizarReplica.php" class="login-form" method="post">
			 
				<div class="header">
				   <h1>Qué pensas de tu calificacion?</h1>
				</div>
			 
				<div class="content">
					<label for="coment">Dejá tu comentario:</label>
					<textarea type="input" maxlength="160" rows="10" name="replica" class="input"  required="required" size=25></textarea></br></br>
					<input type="hidden" name="idPostulacion" value= <?php echo "$idPostulacion"; ?> >
				</div>
				
				<div class="footer">
				   <input type="submit" name="comentar" value="Comentar" class="button" />
				</div>
			
			</form>