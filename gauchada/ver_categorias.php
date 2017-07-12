<html>
<?php

include("cabecera.php");
include("clases.php");
try{
$login = new Login;
$ok=$login->autorizar();
}
catch(Exception $e){
	 $mensaje= $e->getMessage();
   header("Location:index.php?msj='$mensaje'");
}
?>
<head>
 <script type="text/javascript" src="js/confirmar_borrar.js"></script>
 </head>
<body>

<div id="container">
<?php


include_once("conexion.php");
$link = conectar();
$query= "SELECT * FROM categoria ORDER BY categoria.idCategoria DESC ";
$result=mysqli_query($link,$query);
$num=mysqli_num_rows($result);
?>

	<div id="tablita">
	<table>
		<tr>
			<th>CATEGORIA DE GAUCHADA</th>
	         <th>MODIFICAR</th>
	         <th>BAJA</th>
		</tr>
		<?php for ($i=0; $i < $num ; $i++) { 
			 $row = mysqli_fetch_array($result);
		?>
		<tr>
		  <td id="titulo" align="center" width="400"><?php echo" $row[nombre]" ?> </td>	
	      <td id="boton" > <?php 
	      echo"<a href=modificar_categoria.php?categoria=".$row['idCategoria']."&nomcategoria=".$row['nombre']; ?> >MODIFICAR</a>

	      </td>
	      <td id="boton" > <?php echo"<a id='eliminar' onclick='return confirmarCategoria()' ; href=borrar_categoria.php?categoria=".$row['idCategoria'] ?> >ELIMINAR</a></td>
	  </tr>
	 <?php 
	    } 

	  ?>
	</table>
	</div> 

</div>
</body>
</html>