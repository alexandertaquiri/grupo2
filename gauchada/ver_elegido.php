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
		
		$positivo='1';
		$negativo='-2';
		$neutral='0';
      	
		$idp=$_GET['fila2'];//idp es de idPublicacion;
      	//echo $idp;
      	$id=$_SESSION['id'];//id dueño de la publicacion por las dudas si lo uso mas adelante
             //pero no usar para la consulta ya que es de la session me va a trae siempre al mismo que esta en la session
		
      	$con=conectar();
      	$result=mysqli_query($con,"SELECT usuarios.nombre,postulacion.idPostulacion,postulacion.idPublicacion, usuarios.apellido,usuarios.foto,usuarios.idUsuario, usuarios.telefono, usuarios.email
      		FROM usuarios
      		INNER JOIN postulacion  ON postulacion.idUsuario=usuarios.idUsuario
      		 WHERE postulacion.idPostulacion='$idp'");
      	
    ?>

      	<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
      	<div id="container">
		<div class="table responsive" id="favores3">
		
		<?php
				
				$num=mysqli_num_rows($result);
				if($num == 0){//no se dibuja la tabla y me da como resultado este mensaje
					echo"<h4>NO HAY ELEGIDOS</h4>";
				}
				
                        else{
				?>
					<table class="table" id=favores3>
 						<tr>
	       					<th abbr="titulo" scope="col">NOMBRE</th>
	       					<th abbr="ciudad" scope="col">APELLIDO</th>
	      				    <th abbr="foto" scope="col">FOTO</th>
                            <th>TELÉFONO</th>
	        				<th>EMAIL</th>

      					</tr>
      					<?php
      					   	echo"<h4>ELEGIDO</h4>";
      						for($x = 1; $x <=$num ; $x++){
      							$row = mysqli_fetch_array($result);
      							echo"<tr><td width=300>".$row['nombre']."</td>";
      							echo"<td width=300>".$row['apellido']."</td>";
      							
      							//echo"<td width=300><img src=mostrarImagen.php?idPublicacion=".$row['idPublicacion']."></td>";
      							echo"<td width=200><img src=";
      								if(($row['foto'])==""){
      									echo"./imgs/def.jpg";
      								}else echo"mostrarImagen2.php?idUsuario=".$row['idUsuario'];
      								echo"></td>";

									echo"<td width=250>$row[telefono]</a></td>";
									echo"<td width=250>$row[email]</td></a></td></tr>";
							  }
      					}
      					?>
      					
      				</table>	
		
		</div>
		
	</div>	
</body>
</html>