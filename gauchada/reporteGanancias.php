<!DOCTYPE html>
<html>

<?php
	include('cabecera.php');
	include('conexion.php');
	$link=conectar();

	$fecha1=$_POST['fecha1'];
	$fecha2=$_POST['fecha2'];

	$f1 = $fecha1;
	$f2 = $fecha2;

	$f1 = date("d-m-Y", strtotime($f1));
	$f2 = date("d-m-Y", strtotime($f2));

	// $fecha1= '2017-07-01';
	// $fecha2= '2017-08-01';

	$listaCompras="SELECT compra.idUsuario, fecha, compra.credito, monto, nombre, apellido
				   FROM compra 
				   INNER JOIN usuarios ON (compra.idUsuario=usuarios.idUsuario)
				   WHERE fecha BETWEEN '$fecha1' AND '$fecha2' 
				   ORDER BY fecha ASC";

	$totalGanancias="SELECT sum(monto)
					 FROM compra
					 WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";

	$totalCreditos="SELECT sum(credito)
					FROM compra
					WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";

?>

<head>
		<title>MIS GANANCIAS</title>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
</head>
<body>
	<div class="table responsive" id="ganancias">
		<table class="table">
			<?php echo "<h4>MIS GANANCIAS</h4>"; ?>
		 	<tr>
				<th>NOMBRE</th>
				<th>FECHA DE COMPRA</th>
			    <th>CRÉDITO COMPRADO</th>
			    <th>MONTO PAGADO</th>
			</tr>

			<?php
				$listaCompras=mysqli_query($link, $listaCompras);
				$totalGanancias=mysqli_query($link, $totalGanancias);
				$totalCreditos=mysqli_query($link, $totalCreditos);

				$numFilas=mysqli_num_rows($listaCompras);
				$i=0;
				$ok=true;
				while($i<$numFilas and $ok){
					$filaCompras=mysqli_fetch_array($listaCompras);
					if($filaCompras!=NULL){
							?> 	<tr>
									<td> <?php echo $filaCompras['nombre']; echo " "; echo $filaCompras['apellido']; ?> </td>
									<td> <?php echo $filaCompras['fecha']; ?> </td>
									<td> <?php echo $filaCompras['credito']; ?> </td>
									<td> <?php echo "$ "; echo $filaCompras['monto']; ?> </td>
								</tr>
							<?php
					} else $ok = false;
					$i++;
				}
			?>

			
			<tr>
				<th></th>
				<th></th>
				<th>TOTAL CRÉDITOS</th>
				<th>GANANCIA TOTAL</th>
			
			</tr>

			<?php

				mysqli_num_rows($totalCreditos);
				mysqli_num_rows($totalGanancias);
				$filaCreditos=mysqli_fetch_array($totalCreditos);
				$filaGanancias=mysqli_fetch_array($totalGanancias);

			?>	
			<tr>
				<td></td>
				<td></td>
				<td> <?php echo $filaCreditos[0]; ?> </td>
				<td> <?php echo "$ "; echo $filaGanancias[0]; ?> </td>

			<tr>
				<td></td>
				<td></td>
				<td>DESDE <?php echo $f1 ?> HASTA <?php echo $f2 ?> </td>
				<td> <button type="button" class="botonFecha" onClick="location.href='fechaGanancias.php' " > Cambiar fechas </button> </td>
			</tr>
		</table>
	</div>
</body>
<html>
