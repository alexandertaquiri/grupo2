<?php

	$idPub = $_GET['idPub'];
	$idUser = $_GET['idUser'];

	session_start();
	include("clases.php");
	include("conexion.php");
	$link = conectar();

	//elimino la publicacion
	$eliminarGauchada = "DELETE FROM publicacion WHERE idPublicacion = $idPub";
	mysqli_query($link, $eliminarGauchada);
	//devuelvo el credito
	$devolverCredito = "UPDATE usuarios SET credito=credito + 1 WHERE idUsuario = $idUser ";
	mysqli_query($link, $devolverCredito);

	echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";

?>