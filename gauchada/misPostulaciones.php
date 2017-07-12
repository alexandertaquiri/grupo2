<!DOCTYPE html>
<html>
<head>
	<title>Mis postulaciones</title>
</head>
<body>
	<?php
	    include("cabecera.php");
      	include("clases.php");
      	include("conexion.php");
		
      	//$fecha=date("Y-m-d");
      	//$caducidad="AND publicacion.caducidad >='$fecha'";
      	
      	$idUser=$_SESSION['id'];
		//var_dump($idUser);
      	$con=conectar();
      	//$result=mysqli_query($con,"SELECT p.ciudad,p.titulo,p.descripcion,p.imagen,p.idPublicacion FROM usuarios INNER JOIN  publicacion p ON p.idUsuario=usuarios.idUsuario WHERE usuarios.idUsuario=$id AND P.caducidad >=".$fecha." ORDER BY p.idPublicacion");
      	
		
		//consulta para mostrar la lista de usuarios elegidos de cada publicacion
		$consultax= "SELECT DISTINCT publicacion.idPublicacion, publicacion.idUsuario, publicacion.titulo, publicacion.ciudad, publicacion.descripcion, publicacion.imagen
					FROM postulacion
					INNER JOIN publicacion ON (postulacion.idPublicacion=publicacion.idPublicacion)
					WHERE postulacion.idUsuario='$idUser'";
		
		$resx=mysqli_query($con,$consultax);
		

		
      	?>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
      	<div id="container">
		<div class="table responsive" id="favores3">
		
			<?php
				//Si la consulta devuelve resultados
				$num=mysqli_num_rows($resx);
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO SE ENCONTRARON RESULTADOS</h4>";
				}
				else{
						echo"<h4>GAUCHADAS A LAS QUE ME POSTULE</h4>";
						?>
						<table class="table" >
 						<tr>
	       					<th>GAUCHADA</th>
	       					<th>CIUDAD</th>
	      				    <th>DESCRIPCION</th>    
	       					<th>IMAGEN</th>
							<th>ESTADO</th>
      					</tr>
					<?php
						for($x = 1; $x <=$num ; $x++){
							$row = mysqli_fetch_array($resx);
							
							$idPub=$row ['idPublicacion'];
							//var_dump($idPub);
							
							//seleccionar las publicaciones con usuarios elegidos
							$estadoGauchada="SELECT elige.idPublicacion 
											FROM elige
											WHERE elige.idPublicacion=$idPub";
							$estadoGauchada=mysqli_query($con,$estadoGauchada);
							$filasEstado=mysqli_fetch_array($estadoGauchada);
							
							//si fui elegido para la publicacion actual
							$elegido="	SELECT elige.idPostulacion 
										FROM elige
										INNER JOIN postulacion ON (elige.idPostulacion=postulacion.idPostulacion)
										WHERE postulacion.idUsuario='$idUser' AND postulacion.idPublicacion='$idPub'";
							$elegido=mysqli_query($con,$elegido);
							$filasElegido=mysqli_fetch_array($elegido);
							//var_dump($filasElegido);
					
					?>
							<tr>
								<td><?php echo "$row[titulo]"?></td>
								<td><?php echo "$row[ciudad]"?></td>
								<td><?php echo "$row[descripcion]"?></td>
								<td> <?php echo"<img src=";
											if(($row['imagen'])==""){
												echo"./imgs/Logo2.jpg";
											}else echo "mostrarImagen.php?idPublicacion=".$row['idPublicacion'];
											echo">";
							?>	</td>
								<td>
							<?php 	if($filasEstado == NULL){?>
										<?php echo "Aun no hay elegidos";?>
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
										
					<?php			}else if($filasEstado != 0 && $filasElegido!= NULL){
												 echo "Fuiste elegido para cumplir esta GAUCHADA";
												 ?><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span><?php
										}else { echo "No fuiste elegido esta vez";
											?><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span><?php
										}
						}			 	
						
					}?>
							</td>
							</tr>
      	
							
		</table>
		</div>
		
	</div>	
</body>
</html>