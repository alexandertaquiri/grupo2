<html lang="es">
	<body>
		<div id="menu">
			<form action="index.php" method="GET">
				
				titulo:
				<input type="text" name="busca" size="30" placeholder="animales, objetos, pedidos, etc.">
				categorias:
				<select name="categorias">
					<option value="Todos">Todos</option>
					<?php
						include_once("conexion.php");
						$link=conectar();
						$query="SELECT * FROM categoria";
						$result=mysqli_query($link,$query);
						while($row=mysqli_fetch_array($result)){
							if($row['idCategoria']==$_GET['categorias']){
								echo"<option value='".$row['idCategoria']."'selected>".$row['nombre']."</option>";
							}
							else
								echo"<option value='".$row['idCategoria']."'>".$row['nombre']."</option>";
						}
						 mysqli_free_result($result);
                         mysqli_close($link);
					?>	
					
				</select>
				ciudad:
								
				<select name="ciudad">
					<option value="Todos">Todos</option>
					<?php
						include_once("conexion.php");
						$link=conectar();
						$query2="SELECT DISTINCT ciudad FROM publicacion;";
						$result2=mysqli_query($link,$query2);
						while($row=mysqli_fetch_array($result2)){
							if($row['ciudad']==$_GET['ciudad'])	
								echo "<option value='".$row['ciudad']."' selected>".$row['ciudad']."</option>";
							else
								echo "<option value='".$row['ciudad']."'>".$row['ciudad']."</option>";
							
						}
						mysqli_free_result($result2);
                        mysqli_close($link);

					?>
				</select>
				<input type="submit" value="Buscar">
			</form>
		</div>
	</body>
</html>