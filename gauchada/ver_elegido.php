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
      	
		$idp=$_GET['fila2'];//idp es de idPublicacion;
      	//echo $idp;
      	$id=$_SESSION['id'];//id dueño de la publicacion por las dudas si lo uso mas adelante
             //pero no usar para la consulta ya que es de la session me va a trae siempre al mismo que esta en la session
		
      	$con=conectar();
      	$result=mysqli_query($con,"SELECT usuarios.nombre,postulacion.idPostulacion,postulacion.idPublicacion, usuarios.apellido,usuarios.foto,usuarios.idUsuario 
      		FROM usuarios
      		INNER JOIN postulacion  ON postulacion.idUsuario=usuarios.idUsuario
      		 WHERE postulacion.idPostulacion='$idp'");
      	
		//para saber si ya fue calificado
		$calificado=mysqli_query($con,"SELECT comentario, calificacion, replica FROM elige WHERE idPostulacion='$idp'");
		$calificado=mysqli_fetch_array($calificado);
      	?>

      	<div id="container">
		<div id="favores2">
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
		
			<?php
				
				$num=mysqli_num_rows($result);
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO HAY POSTULANTES</h4>";
				}
				
                        else{
				?>
					<table>
 						<tr>
	       					<th abbr="titulo" scope="col">NOMBRE</th>
	       					<th abbr="ciudad" scope="col">APELLIDO</th>
	      				    <th abbr="foto" scope="col">FOTO</th>    
	       					<th abbr="elegir" scope="col">ESTADO DEL ELEGIDO</th>
                            <th>CALIFICACION</th>
	        				<th>COMENTARIO</th>
							<th>REPLICA</th>
      					</tr>
      					<?php
      					   
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							echo"<tr><td width=300>".$row['nombre']."</td>";
      							echo"<td width=300>".$row['apellido']."</td>";
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=200><img src=";
      								if(($row['foto'])==""){
      									echo"./imgs/def.jpg";
      								}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
      								echo"></td>";
                                                 
                                echo"<td width=300>este usuario fue elegido</td>"; 
								if($calificado[0]==NULL){
										?>
										<td width=300>
											<button type="button" class=b1 onClick="location.href='comentarCalificacion.php?id=<?php echo $id; ?>&puntaje=<?php echo $positivo; ?>&idPostulacion=<?php echo $idp; ?>&calificacion=<?php echo "positivo" ?>' " > <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> </button>
											<button type="button" class=b2 onClick="location.href='comentarCalificacion.php?id=<?php echo $id; ?>&puntaje=<?php echo $neutral; ?>&idPostulacion=<?php echo $idp; ?>&calificacion=<?php echo "neutral" ?>' " > <span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span> </button> 
											<button type="button" class=b3 onClick="location.href='comentarCalificacion.php?id=<?php echo $id; ?>&puntaje=<?php echo $negativo; ?>&idPostulacion=<?php echo $idp; ?>&calificacion=<?php echo "negativo" ?>' " > <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> </button>
										</td>
										<?php
										echo"<td width=250>$calificado[comentario]</td>";
										echo"<td width=250>$calificado[replica]</a></td></tr>";
										//<a href=misElegidos.php>Calificar</a>	
								}else {
										echo"<td width=250>$calificado[calificacion]</a></td>";
										echo"<td width=250>$calificado[comentario]</td>";
										echo"<td width=250>$calificado[replica]</a></td></tr>";
								   }
							  }
      					}
      					?>
      					
      				</table>	
		
		</div>
		
	</div>	
</body>
</html>