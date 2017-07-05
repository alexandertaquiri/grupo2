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
		
		
		$filaCredito="SELECT credito.monto 
						FROM credito
						WHERE idUsuario=$idUser";
		
		//por si no existe la fila credito para este usuario
		if(mysqli_num_rows(mysqli_query($bd, $filaCredito))!=0){
			//si existe y si el voto fue positivo incremento el monto
			if($puntaje == '1'){
				$actualizaCredito="UPDATE credito 
									SET monto=monto + 1
									WHERE idUsuario = $idUser";
				mysqli_query($bd, $actualizaCredito);
			}
		
		}else{
				//sino la creo
			if($puntaje == '1')
				$crearFilaCredito="INSERT IGNORE INTO credito (idCredito, monto, idUsuario) VALUES (NULL, '2', $idUser)";
				
				else $crearFilaCredito="INSERT IGNORE INTO credito (idCredito, monto, idUsuario) VALUES (NULL, '1', $idUser)";
			
			mysqli_query($bd, $crearFilaCredito);
			
		}
		
		
		
		mysqli_close($bd);
		//cierro la conexion con la base de datos

		echo "<script> alert('Calificacion enviada!') </script>";
		echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";
?>