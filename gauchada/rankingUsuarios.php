<!DOCTYPE html>
<html>
		<?php
			include("cabecera.php");
			include('conexion.php');
			include('calcularReputacion.php');
			$link=conectar();

		?>	
	<head>
		<title>Top 10 mejores usuarios</title>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
      	<div id="container">
		<div class="table responsive" id="favores3">
	</head>
	<body>
	<table class="table">
	<?php echo "<h4>TOP 10 MEJORES GAUCHOS</h4>"; ?>
	 	<tr>
			<th>NOMBRE</th>
			<th>APELLIDO</th>
		    <th>PUNTAJE</th>
		    <th>REPUTACION</th>
		    <th>FOTO</th>
		</tr>

		<?php

			$topTen="SELECT nombre, apellido, puntos, rol, foto, idUsuario
					FROM usuarios
					ORDER BY puntos DESC";

			$topTen=mysqli_query($link, $topTen);
			//var_dump($topTen);
			
			$filas=mysqli_num_rows($topTen);
			if($filas > 0){
				$i=1;
				$ok=true;
				while($i<=10 and $ok){
					$fila=mysqli_fetch_array($topTen);
					if($fila!=NULL){
						//si no es administrador
						if($fila['rol']==0){
							?> <tr>
								<td> <?php echo $fila['nombre']; ?> </td>
								<td> <?php echo $fila['apellido']; ?> </td>
								<td> <?php echo $fila['puntos']; ?> </td>
								<td> <?php echo verReputacion($fila['idUsuario'], $link); ?> </td>
								<td> <?php echo"<img src=";
													if(($fila['foto'])==""){
													echo"./imgs/def.jpg";
												}else echo "mostrarImagen2.php?idUsuario=".$fila['idUsuario'];
												echo">";
											?></td>
							</tr>
							<?php
						}
					} else $ok = false;
					$i++;
				}
			}
		?>
	</table>
			


