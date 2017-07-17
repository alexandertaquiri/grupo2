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
		
		
		$filaCredito="SELECT credito
						FROM usuarios
						WHERE idUsuario=$idUser";
		
		// si el voto fue positivo incremento el credito
		if($puntaje == '1'){
			$actualizaCredito=" UPDATE usuarios 
								SET credito=credito + 1
								WHERE idUsuario = $idUser";
				mysqli_query($bd, $actualizaCredito);
		}
		
		mysqli_close($bd);
		//cierro la conexion con la base de datos

		echo "<script> alert('Calificacion enviada!') </script>";
		echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";
?>