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
							
							
							//seleccionar las publicaciones con usuarios elegidos
							$estadoGauchada="SELECT * 
											FROM elige
											WHERE EXISTS (SELECT idPublicacion
																	FROM postulacion)";
							$estadoGauchada=mysqli_query($con,$estadoGauchada);
							$filasEstado=mysqli_fetch_array($estadoGauchada);
							//var_dump($estadoGauchada);
					
					?>
							<tr>
								<td><?php echo "$row[titulo]"?></td>
								<td><?php echo "$row[ciudad]"?></td>
								<td><?php echo "$row[descripcion]"?></td>
								<td> <?php echo"<img src=";
											if(($row['imagen'])==""){
												echo"./imgs/def2.jpg";
											}else echo "mostrarImagen.php?idPublicacion=".$row['idPublicacion'];
											echo">";
							?>	</td>
							<?php 	if($filasEstado == NULL){?>
										<td><?php echo "Aun no hay elegidos";?></td>
										
							</tr>
					<?php			}else if($filasEstado != 0){ ?>
												<td><?php echo "Ya hay un elegido para esta GAUCHADA";?></td>
						<?php				}
						}			 
						
					}?>
      	
							
		</table>
		</div>
		<?php
				
			 include("footer.php");
		?>
	</div>	
</body>
</html>