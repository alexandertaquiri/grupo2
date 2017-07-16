<?php
		Include("conexion.php");
		$link=conectar();
		
		$idUser = $_GET['idUser'];
		$idPub = $_GET['idPub'];
		
		$alta="INSERT INTO favorito (idFavorito, idUsuario, idPublicacion) 
				VALUES ('', '$idUser', '$idPub')";
		mysqli_query($link, $alta);
		
		echo "<script> alert('Guardaste la gauchada en tus favoritos.') </script>";
		echo "<script>location.href='/gauchada/index.php'</script>";
?>