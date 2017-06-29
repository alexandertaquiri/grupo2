<html>
<head>
	<title></title>
</head>
<body>
	<?php
	    include("cabecera.php");
      	include("clases.php");
      	include("conexion.php"); 
      	$idp=$_GET['fila2'];//idp es de idPublicacion;
      	//echo $idp;

      	$id=$_SESSION['id'];//id dueño de la publicacion por las dudas si lo uso mas adelante
             //pero no usar para la consulta ya que es de la session me va a trae siempre al mismo que esta en la session
    
      	$con=conectar();
      	$result=mysqli_query($con,"SELECT usuarios.nombre,postulacion.idPostulacion,postulacion.idPublicacion, usuarios.apellido,usuarios.foto,usuarios.idUsuario 
      		FROM usuarios
      		INNER JOIN postulacion  ON postulacion.idUsuario=usuarios.idUsuario
      		 WHERE postulacion.idPostulacion='$idp'");
      	
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
	       					<th abbr="elegir" scope="col">ESTADO DEL ELEGIDO</th>
                            
	        				
      					</tr>
      					<?php
      					   
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							echo"<tr><td width=300>".$row['nombre']."</td>";
      							echo"<td width=300>".$row['apellido']."</td>";
      							
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=400><img src=";
      								if(($row['foto'])==""){
      									echo"./imgs/def.jpg";
      								}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
      								echo"></td>";
                                                 

                                echo"<td width=400>este usuario fue elegido</td></tr>"; 
                                             
                                                                             
    						  }
      					}
      					?>
      					
      				</table>	
		
		</div>
		
	</div>	
</body>
</html>