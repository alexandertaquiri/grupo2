<?php

	$idPub = $_GET['idPub'];

	session_start();
	include("clases.php");
	include("conexion.php");
	$link = conectar();

	//elimino la publicacion
	$eliminarGauchada = "DELETE FROM publicacion WHERE idPublicacion = $idPub";
	mysqli_query($link, $eliminarGauchada);
	echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";


?>