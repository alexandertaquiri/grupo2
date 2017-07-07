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
      	$idp=$_GET['fila'];//idp es de idPublicacion;
      	
      	$id=$_SESSION['id'];//id dueño de la publicacion por las dudas si lo uso mas adelante
    
      	$con=conectar();
      	$result=mysqli_query($con,"SELECT usuarios.nombre,postulacion.idPostulacion,postulacion.idPublicacion, usuarios.apellido,usuarios.foto,usuarios.idUsuario 
      		FROM usuarios 
                  
      		INNER JOIN postulacion  ON postulacion.idUsuario=usuarios.idUsuario
      		 WHERE postulacion.idPublicacion='$idp'");
      	
      	?>

      	<div id="container">
		<div id="favores2">
		
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
	       					<th abbr="elegir" scope="col">ELEGIR</th>
                            
	        				
      					</tr>
      					<?php
      					    echo"<h4>POSTULANTES</h4>";
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							echo"<tr><td width=200>".$row['nombre']."</td>";
      							echo"<td width=200>".$row['apellido']."</td>";
      							
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=200><img src=";
      								if(($row['foto'])==""){
      									echo"./imgs/def.jpg";
      								}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
      								echo"></td>";
                                                echo"<td width=200><a href=elegir.php?fila=".$row['idPublicacion']."&postulacion=".$row['idPostulacion'].">Elegir</a></td></tr>";      
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