<html lang="es">
	<body>
		<?php
			include("cabecera.php");
			include("conexion.php");
			$link=conectar();
			$id = $_GET['fila'];//fila es una variable por parametro que recibe un valor o campo de la base de datos "id publicacion"
			
			$result = mysqli_query($link , "SELECT titulo,ciudad,foto,email,nombre ,descripcion, telefono,idPublicacion FROM publicacion INNER JOIN  usuarios ON publicacion.idUsuario=usuarios.idusuario WHERE idPublicacion=$id ");
			$row=mysqli_fetch_array($result);
			echo "<h2>PUBLICACION</h2>"
			?>
			<div id="columna">
				<?php
				    echo"<h2> Imagen de la Gauchada</h2>";
				 	echo "<img id=imagen src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']. " >";;
				?>
			<div>
			<div id='descripcionProducto'>

				<?php
                echo"<h2> titulo: ".$row['titulo']."</h2>";
				echo"<h2> ciudad: ".$row['ciudad']."</h2>";
				
				echo"<h2> descripcion: ".$row['descripcion']."</h2>";
				echo"<h2> publicado por: ".$row['nombre']." </h2>";
				
				
				//mysqli_free_result($result);
				//mysqli_close($link);

				?>
		</div>
	
</body>
	
</html>