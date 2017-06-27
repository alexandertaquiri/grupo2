<?php	
		Include("conexion.php");
		$bd=conectar();
		
		$idUser = $_POST['idUsuario'];
		$idPub = $_POST['idPublicacion'];
		$comentario = $_POST['coment'];
		
		$alta="INSERT INTO postulacion (idPostulacion, idUsuario, comentario, idPublicacion) 
				VALUES ('', '$idUser', '$comentario', '$idPub')";
		mysqli_query($bd, $alta);
		
		echo "<script> alert('Te postulaste a la gauchada!') </script>";
		echo "<script>location.href='/gauchada/index.php'</script>";
?>