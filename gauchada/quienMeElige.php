<!DOCTYPE html>
<html>
<head>
	<title>Quién me eligió</title>
</head>
<body>
	<?php
	    include("cabecera.php");
      	include("clases.php");
      	include("conexion.php");
		
      	$idUser=$_GET['id'];
      	$con=conectar();
      	
		$datos= "SELECT nombre, apellido, foto, telefono, email 
				FROM usuarios
				WHERE idUsuario='$idUser'";
		
		$resx=mysqli_query($con,$datos);
		
      	?>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
      	<div id="container">
		<div class="table responsive" id="favores3">
		
			<?php
				//Si la consulta devuelve resultados
						$num=mysqli_num_rows($resx);
						echo"<h4>QUIÉN ME ELIGIÓ</h4>";
						?>
						<table class="table" >
 						<tr>
	       					<th>NOMBRE</th>
	       					<th>APELLIDO</th>
	      				    <th>FOTO</th>    
	       					<th>TELÉFONO</th>
							<th>EMAIL</th>
      					</tr>
					<?php
						for($x = 1; $x <=$num ; $x++){
							$row = mysqli_fetch_array($resx);
					?>
							<tr>
								<td><?php echo "$row[nombre]"?></td>
								<td><?php echo "$row[apellido]"?></td>
								<td> <?php echo"<img src=";
											if(($row['foto'])==""){
												echo"./imgs/def.jpg";
											}else echo "mostrarImagen2.php?idUsuario=".$idUser;
											echo">";
							?>	</td>
								<td><?php echo "$row[telefono]"?></td>
								<td><?php echo "$row[email]"?></td>
								

										
					<?php	
						}
									 		
					?>
							</tr>
	
		</table>
		</div>
		
	</div>	
</body>
</html>