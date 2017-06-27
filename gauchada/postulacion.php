<?php

	$idUser = $_GET['idUser'];
	$idPub = $_GET['idPub'];
	//$comentario = $_GET['comentario'];
	
	//$comentario="mmmmm";
	//echo $idUser;
	//echo ' ';
	//echo $idPub;
	
	Include("conexion.php");
	$bd=conectar();
	
	//averiguar si el usuario ya se postulo a la publicacion
				
	$consulta="SELECT * FROM postulacion WHERE idUsuario='$idUser' AND idPublicacion='$idPub'";
 	//guardo el resultado de la consulta

	$resultado=mysqli_query($bd,$consulta);
	
	$filas=$resultado->num_rows;			
	
	//var_dump($filas);
	//die;
		
	if($filas==0){
		
			?>
			<link rel="stylesheet" type="text/css" href="css/estilos.css">
			<form name="formulario2" action="altaPostulacion.php" class="login-form" method="post">
			 
				<div class="header">
				   <h1>Por qué te postulás?</h1>
				</div>
			 
				<div class="content">
					<label for="coment">Comentario:</label>
					<input type="input" name="coment" class="input"  required="required" size=25></br></br>
					<input type="hidden" name="idUsuario" value=<?php echo "$idUser"; ?> >
					<input type="hidden" name="idPublicacion" value= <?php echo "$idPub"; ?> >
				</div>
				
				<div class="footer">
				   <input type="submit" name="comentar" value="Comentar" class="button" />
				</div>
			
			</form>
		<?php
		
		
	}
		else{
				echo "<script> alert('Ya te habias postulado a esta gauchada con anterioridad.') </script>";
				echo "<script>location.href='/gauchada/index.php'</script>";
		}
	
?>