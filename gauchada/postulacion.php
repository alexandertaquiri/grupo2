<?php
	include("cabecera.php");
	$idUser = $_GET['idUser'];
	$idPub = $_GET['idPub'];
?>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<form name="formulario2" action="altaPostulacion.php" class="form" method="post">
		<div class="header">
		   <h1>Por qué te postulás?</h1>
		</div>
		<div class="content">
			<label for="coment">Dejá tu comentario:</label>
			<textarea type="input" maxlength="160" rows="10" name="coment" class="input"  required="required" size=25></textarea></br>
			<input type="hidden" name="idUsuario" value=<?php echo "$idUser"; ?> >
			<input type="hidden" name="idPublicacion" value= <?php echo "$idPub"; ?> >
			</div>
		<div class="footer">
			 <input type="submit" name="comentar" value="Comentar" class="button" />
		</div>
					
	</form>
