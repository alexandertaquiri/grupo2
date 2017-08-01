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
$query= "SELECT * FROM reputacion ORDER BY reputacion.idReputacion DESC ";
$result=mysqli_query($link,$query);
$num=mysqli_num_rows($result);
?>

	<div id="tablita">
	<table>
		<tr>
			<th>REPUTACION DE GAUCHADA</th>
			<th>PUNTAJE DE REPUTACION</th>
	         <th>MODIFICAR</th>
	         <th>BAJA</th>
		</tr>
		<?php for ($i=0; $i < $num ; $i++) { 
			 $row = mysqli_fetch_array($result);
		?>
		<tr>
		  <td id="titulo" align="center" width="400"><?php echo" $row[categoria]" ?> </td>
		   <td id="titulo" align="center" width="400"><?php echo" $row[puntaje]" ?> </td>		
	      <td id="boton" > <?php 
	      echo"<a href=modificar_reputacion.php?categoria=".$row['idReputacion']."&nomcategoria=".$row['categoria']; ?> >MODIFICAR</a>

	      </td>
	      <td id="boton" > <?php
	      	if(($row['idReputacion']==2 )| ($row['idReputacion']==1)){
	      		  echo"NO SE PUEDE ELIMINAR";
	      	}
	      	else{ 
	      echo"<a id='eliminar' onclick='return confirmarReputacion()' ; href=borrar_reputacion.php?categoria=".$row['idReputacion']; echo">ELIMINAR</a></td>"; }?>
	  </tr>
	 <?php 
	    } 

	  ?>
	</table>
	</div> 

</div>
</body>
</html>