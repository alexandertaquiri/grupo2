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
            
      	$fecha=date("Y-m-d");
      	$caducidad="AND publicacion.caducidad >='$fecha'";
      	
      	$id=$_SESSION['id'];
    
      	$con=conectar();
      	$result=mysqli_query($con,"SELECT p.ciudad,p.titulo,p.descripcion,p.imagen,p.idPublicacion FROM usuarios INNER JOIN  publicacion p ON p.idUsuario=usuarios.idUsuario WHERE usuarios.idUsuario=$id AND P.caducidad >=".$fecha." ORDER BY p.idPublicacion");
      	
      	?>

      	<div id="container">
		<div id="favores2">
		
			<?php
				
				$num=mysqli_num_rows($result);
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO SE ENCONTRARON RESULTADOS</h4>";
				}
				
                        else{
				?>
					<table >
 						<tr>
	       					<th abbr="titulo" scope="col">TITULO</th>
	       					<th abbr="ciudad" scope="col">CIUDAD</th>
	      				    <th abbr="foto" scope="col">DESCRIPCION</th>    
	       					<th abbr="foto" scope="col">FOTO</th>
                                          <th abrr="postulantes" scope="col">Postulantes </th>
	        				
      					</tr>
      					<?php
                                          echo"<h4>MIS PUBLICACIONES</h4>";
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							
									/*if(isset($_SESSION['estado'])){
      	  		 						if($_SESSION['estado']=="logeado"){
      	                               		echo"<tr><td width=300><h4><a href=detalles.php?fila=".$row['idPublicacion'].">".$row['titulo']."</a></h4></td>";
      	  			
										}
									}
									else{echo"<tr><td width=300>".$row['titulo']."</td>";}*/
		
      							echo"<tr><td width=300>".$row['titulo']."</td>";
      							echo"<td width=200>".$row['ciudad']."</td>";
      							echo"<td width=400>".$row['descripcion'],"</td>";
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=300><img src=";
      								if(($row['imagen'])==""){
      									echo"./imgs/logo2.jpg";
      								}else echo"mostrarImagen.php?idPublicacion=".$row['idPublicacion'];
      								echo"></td>";
                                                 $resul2=mysqli_query($con,"SELECT idPublicacion ,elige.idPostulacion FROM elige  WHERE elige.idPublicacion=".$row['idPublicacion']." ");//verificamos que se a elegido a un apersona
                                                $row2= mysqli_fetch_array($resul2);
                                                if(mysqli_num_rows($resul2)>=1){  
                                                     
                                                      echo"<td width=300><a href=ver_elegido.php?fila2=".$row2['idPostulacion'].">ESTA PUBLICACION TIENE UN ELEGIDO</a></td></tr>"; 
                                                      } 
                                                else {        
                                                echo"<td width=300><a href=ver_postulantes.php?fila=".$row['idPublicacion'].">POSTULANTES</a></td></tr>";  
                                                }    
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