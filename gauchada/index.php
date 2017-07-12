<html>
<?php
	if(isset($_GET['msj'])){
  		 $mensaje= $_GET['msj'];
//

   	if($mensaje="2")
  		 echo"<script> alert ('DEBE ESTAR REGISTRADO PARA ACCEDER')</script>"; 
}?>

<head>
	<title> Una gauchada </title>
</head>
	
<body>
	
	<?php
		Include ("cabecera.php");
	?>

	<!--
	Funcionalidad
	-->
	<div id="container">
		<div id="favores">
			<?php
				include ("menu.php");
				include_once("conexion.php");
				include("funciones.php");
				
				$filtrar=filtrarpor();//es una funcion declarada en el archivo funciones y lo concateno en la consulta principal 
				$link = conectar();
				$orderby="ORDER BY publicacion.idPublicacion DESC";
				$query="SELECT idPublicacion, ciudad,imagen, titulo, descripcion 
						FROM publicacion
						WHERE publicacion.idPublicacion NOT IN(SELECT elige.idPublicacion
																FROM elige
																WHERE elige.idPublicacion=publicacion.idPublicacion)".$filtrar."".$orderby;
				$result =mysqli_query($link,$query);
				
				$num=mysqli_num_rows($result);
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO SE ENCONTRARON RESULTADOS</h4>";
				}
				
                else{
				?>
					<table>
 						<tr>
	       					<th abbr="titulo" scope="col">TITULO</th>
	       					<th abbr="ciudad" scope="col">CIUDAD</th>
	      				    <th abbr="foto" scope="col">DESCRIPCION</th>    
	       					<th abbr="foto" scope="col">FOTO</th>
	        				
      					</tr>
      					<?php
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							
									/*if(isset($_SESSION['estado'])){
      	  		 						if($_SESSION['estado']=="logeado"){
      	                               		echo"<tr><td width=300><h4><a href=detalles.php?fila=".$row['idPublicacion'].">".$row['titulo']."</a></h4></td>";
      	  			
										}

									}
									else{echo"<tr><td width=300>".$row['titulo']."</td>";}*/


		
      							echo"<tr><td width=300 align='center'><h4><a href=detalles.php?fila=".$row['idPublicacion'].">".$row['titulo']."</a></h4></td>";
      							echo"<td width=200 align='center'>".$row['ciudad']."</td>";
      							echo"<td width=400 align='center'>".$row['descripcion'],"</td>";
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=250><img src=";
      							if(($row['imagen'])==""){
      								echo"./imgs/logo2.jpg";
      							}else 
									echo"mostrarImagen.php?idPublicacion=".$row['idPublicacion'];
									echo"></td>";
									
								//Link postularse
								if (isset ($_SESSION['estado'])){
									if (isset ($_SESSION['estado'])=="logeado"){
										if($_SESSION['rol']=="0"){
                        	                 
											$idUser=$_SESSION['id'];
											$idPub=$row['idPublicacion'];
										?>
											<td><button type="button" class="btn btn-info" onClick="location.href='postulacion.php?idUser=<?php echo $idUser; ?>&idPub=<?php echo $idPub;?>' " > Postularse </button></td>
										<?php
										}
										//echo"<td width=100> <a href= </a>Postularse</td></tr>";
									}
								}
      							
      						}
      					}
      					?>
      					
      				</table>	
		
		</div>
		
	</div>

</body>

</html>