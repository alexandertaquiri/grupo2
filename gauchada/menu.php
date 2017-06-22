<html lang="es">
	<body>
		<div id="menu">
			<form action="index.php" method="GET">
				nombre: 
				<input type="text" name="busca" size="25" placeholder="animales, objetos perdidos, etc.">
				titulo:
				<input type="text" name="busca2" size="30" placeholder="Ingrese el titulo a buscar">
				ciudad:
								
				<select name="ciudad">
					<option value="Todos">Todos</option>
					<?php
						include_once("conexion.php");
						$link=conectar();
						$query="SELECT * FROM publicacion;";
						$result=mysqli_query($link,$query);
						while($row=mysqli_fetch_array($result)){
							if($row['ciudad']==$_GET['ciudad'])	
								echo "<option value='".$row['ciudad']."' selected>".$row['ciudad']."</option>";
							else
								echo "<option value='".$row['ciudad']."'>".$row['ciudad']."</option>";
							
						}

					?>
				</select>
				<input type="submit" value="Buscar">
			</form>
		</div>
	</body>
</html>