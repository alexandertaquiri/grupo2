<?php	
		Include("conexion.php");
		$bd=conectar();
		
		$idUser = $_POST['idUsuario'];
		$idPostulacion = $_POST['idPostulacion'];
		$comentario = $_POST['coment'];
		$puntaje = $_POST['puntaje'];
		$calificacion = $_POST['calificacion'];
		
		$actualizaPuntaje= "UPDATE usuarios SET puntos=puntos + $puntaje  WHERE idUsuario = $idUser";
		//guardo la consulta para referirla a continuacion
		mysqli_query($bd, $actualizaPuntaje);
		//Hago la consulta a la base de datos, y guardo el resultado. En este caso no porque es una actualizacion
		
		$actualizaComentario= "UPDATE elige 
								SET comentario='$comentario'
								WHERE idPostulacion = $idPostulacion";
		mysqli_query($bd, $actualizaComentario);
		
		
		$actualizaCalificacion= "UPDATE elige 
								SET calificacion='$calificacion'
								WHERE idPostulacion = $idPostulacion";
		mysqli_query($bd, $actualizaCalificacion);
		
		mysqli_close($bd);
		//cierro la conexion con la base de datos

		echo "<script> alert('Calificacion enviada!') </script>";
		echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";
?>