<html lang="es">
	<body>
	<head>
		<link href="css/estilos.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
		<?php
		
            include("clases.php");
			include("cabecera.php");
			include("conexion.php");

			$link=conectar();
			$id = $_GET['fila'];//fila es una variable por parametro que recibe un valor o campo de la base de datos "id publicacion"
			
			$result = mysqli_query($link , "SELECT * FROM publicacion INNER JOIN  usuarios ON publicacion.idUsuario=usuarios.idUsuario WHERE idPublicacion=$id ");
			$row=mysqli_fetch_array($result);
			
			?>
			<div class="cantainer-fluid">
				<div class="row center-block">
					<div class="col-md-12">
						<?php echo"<h1 class='text-center'><strong>".$row['titulo']."</strong></h1>"; ?>
						<div class="col-md-8">
							<?php
							    
							 	//echo "<img id=imagen src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']. " >";;
							 	echo"<img class='img-responsive' src=";
			      								if(($row['imagen'])==""){
			      									echo"./imgs/logo2.jpg";
			      								}else echo "mostrarImagen.php?idPublicacion=".$row['idPublicacion']."
			      							>";         

							?>
						</div>
						<div class="col-md-4">
							<?php
							echo"<h3><strong>Ciudad: </strong>".$row['ciudad']."</h3>";
							echo"<h3><strong>Descripción: </strong> ".$row['descripcion']."</h3>";

							?>
						</div>
					</div>
					<div class="col-md-12">
							 <?php
								echo"<h3 class='text-center'><strong> Publicado por:</strong> ".$row['nombre']." </h3>";
							     $result2=mysqli_query($link," SELECT * FROM comenta INNER JOIN  usuarios ON comenta.idUsuario=usuarios.idUsuario WHERE idPublicacion=".$row['idPublicacion']."");
								 //$row2=mysqli_fetch_array($result2);
							 	     
							 	echo"<h3><strong>Comentarios</strong></h3>";	//echo"<h7>algunos comentarios:".$row2['comentario']."</h7>";
			                    while($row2=mysqli_fetch_array($result2)){
			                     	$com =  "<div class='panel panel-default'>
												<div class='panel-body'>
							                     	<div class='media col-md-9'>
														<div class='media-left'>
														</div>
													    <div class='media-body'>
														    <h4 class='media-heading'>".$row2['nombre']." <small><i>30/06/2017</i></small></h4>
														    <p>".$row2['comentario']."</p>
													    </div>";

											if ($row2['respuesta']) {
												$com .= "<div class='media col-md-9'>
															<div class='media-left'>		      
															</div>
															<div class='media-body'>
															    <h4 class='media-heading'>".$row['nombre']." <small><i>30/06/2017</i></small></h4>
															    <p>".$row2['respuesta']."</p>
															</div>
														</div>
													</div>";
											} else {
												$com .= "</div>";
											}

									
					                     	if (isset($_SESSION['id'])) {
									 			$userId = $_SESSION['id'];
						                     	if ($userId == $row['idUsuario']) {
						                     		$com .= "<a href='replyComment.php?idUsuario=".$id."&idPublicacion=".$row2['idPublicacion']."&idUs2=".$row2['idUsuario']."' class='btn btn-info' role='button'>Responder</a>";
							                     				
						                     	}
					                     	}
			                     	echo $com.	"</div>
											</div>";
			                    }

			            
							 	if (isset($_SESSION['id'])) {
							 		$userId = $_SESSION['id'];
							 		if ($userId != $row['idUsuario']) {
							 			
							 ?>
										 <div class="wrapper">
										     <div id="wrapper">
										        <form name="formulario2" action="alta_comentario.php" class="login-form"  method="POST" enctype="multipart/form-data">  
										                <div class="header">
										               		<h1>Deja tu comentario</h1>
										               		<textarea type="text" name="comentar" class="form-control" required="required" rows="4" cols="50"></textarea>
										           		 </div>
										           		  
										    				 <input type="hidden" name="idpublicacion"   value='<?php echo" $id";?>' >
										     						  				  
										  				  <div class="footer">
										              		 <input type="submit" name="Ingresar" value="Enviar" class="button" />    
										                  </div>	 
												</form>

										     </div>      

								        </div>
							  <?php
							  		}
							  	}

							  ?>
					</div>
		 		</div>
		 	</div>      
	</body>	
</html>