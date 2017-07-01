<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	    include("cabecera.php");
      	include("clases.php");
      	include("conexion.php");
		
		$positivo='1';
		$negativo='-2';
		$neutral='0';
		

      	//$fecha=date("Y-m-d");
      	//$caducidad="AND publicacion.caducidad >='$fecha'";
      	
      	$idUser=$_SESSION['id'];
    
      	$con=conectar();
      	//$result=mysqli_query($con,"SELECT p.ciudad,p.titulo,p.descripcion,p.imagen,p.idPublicacion FROM usuarios INNER JOIN  publicacion p ON p.idUsuario=usuarios.idUsuario WHERE usuarios.idUsuario=$id AND P.caducidad >=".$fecha." ORDER BY p.idPublicacion");
      	
		
		//consulta para mostrar la lista de usuarios elegidos de cada publicacion
		$consultax= "SELECT DISTINCT elige.idPostulacion, publicacion.idPublicacion, elige.comentario, publicacion.titulo, elige.replica, postulacion.idUsuario, usuarios.nombre, usuarios.foto, calificacion, usuarios.foto
				FROM elige, publicacion, postulacion, usuarios
				WHERE (elige.idPublicacion=publicacion.idPublicacion) AND (publicacion.idUsuario='$idUser') AND (elige.idPostulacion=postulacion.idPostulacion) AND (usuarios.idUsuario=postulacion.idUsuario)
				ORDER BY elige.idPostulacion DESC";
		$resx=mysqli_query($con,$consultax);
		
		//$fila=mysqli_fetch_array($resx);
		
      	?>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
      	<div id="container">
		<div id="favores2">
		
			<?php
				$num=mysqli_num_rows($resx);
				//$num=mysqli_num_rows($result);
				
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO SE ENCONTRARON RESULTADOS</h4>";
				}
				
                        else{
				?>
					<table name="tabla" class="tabla" id="tabla">
 						<tr>
	       					<th width=250>GAUCHADA</th>
	       					<th width=250>USUARIO</th>
	      				    <th width=200>CALIFICACION</th>    
	       					<th width=250>COMENTARIO</th>
                            <th width=250>REPLICA</th>
							<th width=200>FOTO</th>
	        				
      					</tr>
      					<?php
							echo"<h4>CALIFICACIONES</h4>";
      						for($x = 1; $x <=$num ; $x++){
								
      							$row = mysqli_fetch_array($resx);
      							
								$idPostulacion=$row['idPostulacion'];
								
								$calificado=mysqli_fetch_array(mysqli_query($con,"SELECT elige.calificacion FROM elige WHERE idPostulacion=$idPostulacion"));
								$replica=mysqli_fetch_array(mysqli_query($con,"SELECT elige.replica FROM elige WHERE idPostulacion=$idPostulacion"));
      							$comentario=mysqli_fetch_array(mysqli_query($con,"SELECT elige.comentario FROM elige WHERE idPostulacion=$idPostulacion"));
								?><tr>
									<td><?php echo "$row[titulo]"?></td>
									<td><?php echo "$row[nombre]"?></td>
								<?php
								//si hay comentario
								if($calificado[0]==NULL && $comentario[0]==NULL && $replica[0]==NULL){
								?>
									<td>
									
										<button type="button" class=b1 onClick="location.href='comentarCalificacion.php?id=<?php echo $idUser; ?>&puntaje=<?php echo $positivo; ?>&idPostulacion=<?php echo $idPostulacion; ?>&calificacion=<?php echo "positivo" ?>' " > <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> </button>
										<button type="button" class=b2 onClick="location.href='comentarCalificacion.php?id=<?php echo $idUser; ?>&puntaje=<?php echo $neutral; ?>&idPostulacion=<?php echo $idPostulacion; ?>&calificacion=<?php echo "neutral" ?>' " > <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span> </button> 
										<button type="button" class=b3 onClick="location.href='comentarCalificacion.php?id=<?php echo $idUser; ?>&puntaje=<?php echo $negativo; ?>&idPostulacion=<?php echo $idPostulacion; ?>&calificacion=<?php echo "negativo" ?>' " > <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> </button>
								
									</td>			
									<td></td>
									<td></td>
									
									<td> 
									<?php echo"<img src=";
      								if(($row['foto'])==""){
      									echo"./imgs/logo2.jpg";
      								}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
      								echo">"
									?></td>
                                    </tr>
									
								<?php
								}else if($calificado[0]!=NULL && $comentario[0]!=NULL && $replica[0]==NULL){
										//si hay comentario, pero falta la replica
									?>
										<td><?php echo "$row[calificacion]"?></td>
										<td><?php echo "$row[comentario]"?></td>
										<td><button type="button" class="btn btn-info" onClick="location.href='replicarCalificacion.php?idPostulacion=<?php echo $idPostulacion; ?>' " > Responder </button></td>
										
											<td> 
										<?php echo"<img src=";
										if(($row['foto'])==""){
											echo"./imgs/logo2.jpg";
										}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
										echo">"
										?></td>
										</tr>
										
									<?php
								} else if (($calificado[0]!=NULL && $comentario[0]!=NULL && $replica[0]!=NULL)){
										?>
										<td><?php echo "$row[calificacion]"?></td>
										<td><?php echo "$row[comentario]"?></td>
										<td><?php echo "$row[replica]"?></td>
										<td> 
										<?php echo"<img src=";
										if(($row['foto'])==""){
											echo"./imgs/logo2.jpg";
										}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
										echo">"
										?></td>
										</tr>
										
										<?php
								}
								?>
									
									
									
    						  <?php
							  }
      					}
      					?>
      					
      				</table>	
		
		</div>
		<?php
			 include("footer.php");
		?>
	</div>	
</body>
</html>