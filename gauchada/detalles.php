<html lang="es">
	<body>
	<head><link rel="stylesheet" type="text/css" href="css/estilos.css"></head>
		<?php
		
            include("clases.php");
			include("cabecera.php");
			include("conexion.php");
			$link=conectar();
			$id = $_GET['fila'];//fila es una variable por parametro que recibe un valor o campo de la base de datos "id publicacion"
			
			$result = mysqli_query($link , "SELECT titulo,idPublicacion,ciudad,foto,imagen,email,nombre ,descripcion, telefono,idPublicacion FROM publicacion INNER JOIN  usuarios ON publicacion.idUsuario=usuarios.idusuario WHERE idPublicacion=$id ");
			$row=mysqli_fetch_array($result);
			echo "<h2>PUBLICACION</h2>"
			?>
			<div id="columna">
				<?php
				    echo"<h2> Imagen de la Gauchada</h2>";
				 	//echo "<img id=imagen src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']. " >";;
				 	echo"<img src=";
      								if(($row['imagen'])==""){
      									echo"./imgs/logo2.jpg";
      								}else echo "mostrarImagen.php?idPublicacion=".$row['idPublicacion']."
      							>";         

				?>
			<div>
			<div id='descripcionProducto'>

				<?php
                echo"<h2> titulo: ".$row['titulo']."</h2>";
				echo"<h2> ciudad: ".$row['ciudad']."</h2>";
				
				echo"<h2> descripcion: ".$row['descripcion']."</h2>";
				echo"<h2> publicado por: ".$row['nombre']." </h2>";
				
				
				


				?>
				
				 <?php
				     $result2=mysqli_query($link," SELECT comentario FROM comenta  WHERE idPublicacion=".$row['idPublicacion']."");
					 //$row2=mysqli_fetch_array($result2);
				 	     
				 	echo"<h4>comentarios</4>";	//echo"<h7>algunos comentarios:".$row2['comentario']."</h7>";
                     while($row2=mysqli_fetch_array($result2)){
                 
                   // echo" <ol>comentarios";
                     	echo "<li value=' ' class='comentario'>".$row2['comentario']."</li>";
                     //echo"</ol>";

                     }
				 	
				 ?>
				 <div class="wrapper">
      
      
				     <div id="wrapper">
				        <form name="formulario2" action="alta_comentario.php" class="login-form"  method="POST" enctype="multipart/form-data">  
				                <div class="header">
				               		<h1>Deja tu comentario</h1>
				               		<textarea type="text" name="comentar"  required="required" rows="4" cols="50"></textarea>
				           		 </div>
				           		  
				    				 <input type="hidden" name="idpublicacion"   value='<?php echo" $id";?>' >
				     						  				  
				  				  <div class="footer">
				              		 <input type="submit" name="Ingresar" value="Enviar" class="button" />    
				                  </div>	 
						</form>

				     </div>      

		        </div>
		    </div>
		 </div>       
	
</body>	
</html>