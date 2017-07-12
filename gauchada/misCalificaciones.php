<!DOCTYPE html>
<html>
<head>
	<title>Mis calificaciones</title>
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
		$consultax= "SELECT DISTINCT elige.idPublicacion, elige.idPostulacion, elige.calificacion, elige.comentario, elige.replica, publicacion.idUsuario, publicacion.titulo, usuarios.nombre, usuarios.foto
					FROM postulacion
					INNER JOIN elige ON (elige.idPostulacion=postulacion.idPostulacion)
					INNER JOIN publicacion ON (publicacion.idPublicacion=elige.idPublicacion)
					INNER JOIN usuarios ON (postulacion.idUsuario=usuarios.idUsuario)
					WHERE usuarios.idUsuario='$idUser'";
		
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
						echo"<h4>HISTORIAL DE CALIFICACIONES</h4>";
					?>
						<table class="table">
 						<tr>
	       					<th>GAUCHADA</th>
	       					<th>USUARIO</th>
	      				    <th>CALIFICACION</th>    
	       					<th>COMENTARIO</th>
                            <th>REPLICA</th>
							<th>FOTO</th>
	        				
      					</tr>
				<?php
      			for($x = 1; $x <=$num ; $x++){
					$row = mysqli_fetch_array($resx);
      				
					$usuario=$row['idUsuario'];
					$consulta2="SELECT nombre
								FROM usuarios
								WHERE idUsuario='$usuario'";
					
					$consulta2=mysqli_fetch_array(mysqli_query($con,$consulta2));
					//var_dump($consulta2['nombre']$consulta2['nombre']);
					
					
					//Si ya fue calificado
					$replica=$row['replica'];
					$idPostulacion=$row['idPostulacion'];
					$calificado=$row['calificacion'];
					$comentario=$row['comentario'];
					
					if($calificado!="" && $comentario!=""){
			?>
					
						<tr>
							<td><?php echo "$row[titulo]"?></td>
							<td><?php echo "$consulta2[nombre]"?></td>
							<td><?php echo "$row[calificacion]"?></td>
							<td><?php echo "$row[comentario]"?></td>
							<?php
							//Si aun no hay replica, mostrar el boton responder
							if($replica==""){
							?>	
								<td><button type="button" class="btn btn-info" onClick="location.href='replicarCalificacion.php?idPostulacion=<?php echo $idPostulacion; ?>' " > RESPONDER </button></td>
										
								
								<?php
							} else //sino mostrar la replica										
								echo "<td>$row[replica]</td>";?>
										
										<td> <?php echo"<img src=";
											if(($row['foto'])==""){
												echo"./imgs/def.jpg";
											}else echo "mostrarImagen2.php?idUsuario=".$row['idUsuario'];
											echo">";
										?></td>
									</tr>
								  <?php
								}else
									echo"<h4>NO SE ENCONTRARON RESULTADOS</h4>";
							  }
      					}
      					?>
      					
      				</table>	
		</div>
		
	</div>	
</body>
</html>