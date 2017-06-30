<?php

	include("conexion.php");
	$link=conectar();
	$replica = $_POST['replica'];
	$idPostulacion = $_POST['idPostulacion'];
	
	$actualizaComentario= "UPDATE elige SET replica='$replica' WHERE idPostulacion = $idPostulacion";
	
	mysqli_query($link, $actualizaComentario);
		
	mysqli_close($link);
		//cierro la conexion con la base de datos

	echo "<script> alert('Replica enviada!') </script>";
	echo "<script>location.href='/gauchada/misElegidos.php'</script>";

?>