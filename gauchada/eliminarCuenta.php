<?php

	include("clases.php");
	include("conexion.php");
	$link = conectar();
	
	//modificar para recibir el id por parametro
	$idUser='31';
	
	$email="SELECT email FROM usuarios WHERE idUsuario='$idUser'";
	$email=mysqli_query($link, $email);
	$email=mysqli_fetch_array($email);
	$email=$email['email'];

	//guardo los id de las publicaciones del user a borrar
	//$idPub="SELECT idPublicacion FROM publicacion WHERE idUsuario='$idUser'";
	//$idPub=mysqli_query($link, $idPub);
	
	//guardo los id de las postulaciones del user a borrar
	//$idPost="SELECT idPostulacion FROM postulacion WHERE idUsuario='$idUser'";
	//$idPost=mysqli_query($link, $idPost);

	//Busco en elige si tiene usuarios elegidos sin calificar. Si los hay, es porque tiene calificaciones pendientes
	$publicaciones="	SELECT idPublicacion
								FROM publicacion
								WHERE idUsuario='$idUser'";
								

	$publicaciones=mysqli_query($link, $publicaciones);
	$numFilas=mysqli_num_rows($publicaciones);
	
	//recorro la tabla elige en busca de calificaciones pendientes
	$i=1;
	$ok=true;
	while($i <= $numFilas and $ok) {	
		$filas=mysqli_fetch_array($publicaciones);
		$idPub = $filas['idPublicacion'];
		$calificacionPendiente= "SELECT idPostulacion, calificacion
								FROM elige
								WHERE idPublicacion='$idPub' ";
		$calificacionPendiente=mysqli_query($link, $calificacionPendiente);
		$f=mysqli_fetch_array($calificacionPendiente);
		$calificacion=$f['calificacion'];
		echo $calificacion;
		if(mysqli_num_rows($calificacionPendiente)==1){
			$ok=false;
		}
	$i++;
		
	}


	var_dump($publicaciones);
	die;
	
	//Busco en elige si fue postulado sin calificar. Si las hay, es porque tiene gauchadas pendientes.



	if($email=0) {
		//borro las publicaciones tabla elige
		$borrarPubElige=" DELETE FROM elige 
								WHERE idPublicacion 
								IN (SELECT idPublicacion FROM publicacion WHERE idUsuario='$idUser')";

		//borro las postulaciones de la tabla elige
		$borrarPostElige=" DELETE FROM elige 
								WHERE idPostulacion 
								IN (SELECT idPostulacion FROM postulacion WHERE idUsuario='$idUser')";

		mysqli_query($link, $borrarPubElige);
		mysqli_query($link, $borrarPostElige);

		//borro las publicaciones y postulaciones de la tabla postulacion
		$borrarPubPostulacion=" DELETE FROM postulacion 
								WHERE idPublicacion IN (SELECT idPublicacion FROM publicacion WHERE idUsuario='$idUser')";

		$borrarPostPostulacion=" DELETE FROM postulacion 
								WHERE idUsuario ='$idUser' ";

		mysqli_query($link, $borrarPubPostulacion);
		mysqli_query($link, $borrarPostPostulacion);

		//borro todas publicaciones de la tabla publicacion
		$borrarPublicaciones=" DELETE FROM publicacion 
								WHERE idUsuario='$idUser' ";

		mysqli_query($link, $borrarPublicaciones);

		//borro las preguntas del usuario
		$borrarPreguntas=" DELETE FROM comenta 
						WHERE idUsuario='$idUser' ";

		mysqli_query($link, $borrarPreguntas);


		//borro al usuario
		$borrarUser=" DELETE FROM usuarios 
						WHERE idUsuario='$idUser' ";

		mysqli_query($link, $borrarUser);


		echo "<script> alert ('La cuenta $email ha sido borrada.') </script>";
		echo "<script>location.href='/gauchada/ingresar.php'</script>";
	} 
	else {
			echo "<script> alert ('La cuenta no puede ser borrada hasta que regularice su situacion.') </script>";
			echo "<script>location.href='/gauchada/index.php'</script>";
	}
?>