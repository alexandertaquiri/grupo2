<?php
		Include("conexion.php");
		$link=conectar();
		
		$idUser = $_GET['idUser'];
		$idPub = $_GET['idPub'];

		$baja="DELETE FROM favorito WHERE idPublicacion='$idPub' and idUsuario='$idUser' ";
		mysqli_query($link, $baja);
		
		echo "<script> alert('Sacaste la gauchada en tus favoritos.') </script>";
		echo "<script>location.href='/gauchada/index.php'</script>";
?>