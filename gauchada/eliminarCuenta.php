<?php
	/********************************************************************************************************
	Elimina las entradas de este usuario de las tablas, COMENTA, ELIGE, POSTULACION, PUBLICACION, USUARIOS.
	NO lo elimina si eligio a un usuario y no lo califico.
	NO lo elimina si fue elegido pero aun no lo calificaron, o sea que no cumplio con la gauchada.
	NO se fija si tiene o no postulantes.
	REQUIERE que las tablas  COMENTA, ELIGE y POSTULACION permitan borrado en CASCADA desde la base de datos
	*********************************************************************************************************/

	session_start();
	include("clases.php");
	include("conexion.php");

	$link = conectar();
	
	/********************************************/
	//modificar para recibir el id por parametro
	$idUser='33';

	//por algo asi
	//$idUser=$_POST['id'];
	/*******************************************/

	$email="SELECT email FROM usuarios WHERE idUsuario='$idUser'";
	$email=mysqli_query($link, $email);
	$email=mysqli_fetch_array($email);
	$email=$email['email'];

	//Me quedo con las publicaciones de este usuario
	$publicaciones="SELECT elige.idPublicacion
					FROM publicacion
					INNER JOIN elige ON (elige.idPublicacion=publicacion.idPublicacion)
					WHERE idUsuario='$idUser'";
								

	$publicaciones=mysqli_query($link, $publicaciones);
	$numFilas=mysqli_num_rows($publicaciones);
	
	//recorro la tabla elige en busca de calificaciones pendientes para sus publicaciones
	$i=1;
	$encontre=false;
	$faltaCalificar=0;
	while($i <= $numFilas and !$encontre) {	
		$filas=mysqli_fetch_array($publicaciones);
		$idPub = $filas['idPublicacion'];
		$elegidos= "SELECT idPostulacion, calificacion
					FROM elige
					WHERE idPublicacion='$idPub' ";
		$elegidos=mysqli_query($link, $elegidos);
		$f=mysqli_fetch_array($elegidos);
		$calificacion=$f['calificacion'];
		if($calificacion==NULL){
			$encontre=true;
			$faltaCalificar=1;
		}
	$i++;
	
	}
	// si $faltaCalificar vale 1, entonces el usuario tiene al menos un usuario elegido sin calificar
	
	//Busco en elige si fue elegido sin calificar. Si hay filas, es porque tiene gauchadas que cumplir.
	$postulaciones="SELECT elige.idPostulacion
					FROM postulacion
					INNER JOIN elige ON (elige.idPostulacion=postulacion.idPostulacion)
					WHERE idUsuario='$idUser'";

	$postulaciones=mysqli_query($link, $postulaciones);
	$nFilas=mysqli_num_rows($postulaciones);
	
	//recorro la tabla elige en busca de gauchadas sin calificar, que significa sin cumplir
	
	$x=1;
	$enc=false;
	$sinCumplir=0;
	while($x <= $nFilas and !$enc) {	
		$fila=mysqli_fetch_array($postulaciones);
		$idPost = $fila['idPostulacion'];
		$ele= " SELECT idPostulacion, calificacion
				FROM elige
				WHERE idPostulacion='$idPost' ";
		$ele=mysqli_query($link, $ele);
		$fi=mysqli_fetch_array($ele);
		$cali=$fi['calificacion'];
		if($cali==NULL){
			$enc=true;
			$sinCumplir=1;
		}
	$x++;
	}

	//si $sinCumplir vale 1, entonces el usuario fue elegido y aun no realizo la gauchada.

	if($faltaCalificar==0 AND $sinCumplir==0) {
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



		//borro las preguntas del usuario
		$borrarPreguntas=" DELETE FROM comenta 
						WHERE idUsuario='$idUser' ";

		mysqli_query($link, $borrarPreguntas);


		//borro al usuario
		$borrarUser=" DELETE FROM usuarios 
						WHERE idUsuario='$idUser' ";

		mysqli_query($link, $borrarUser);

		//borro todas publicaciones de la tabla publicacion
		$borrarPublicaciones=" DELETE FROM publicacion 
								WHERE idUsuario='$idUser' ";
		mysqli_query($link, $borrarPublicaciones);

		session_unset();
		session_destroy();

		echo "<script> alert ('La cuenta $email ha sido borrada.') </script>";
		echo "<script>location.href='/gauchada/ingresar.php'</script>";
	} 
	else if ($faltaCalificar==1){
			echo "<script> alert ('No es posible borrar su cuenta en este momento. Debe calificar sus gauchadas pendientes.') </script>";
			echo "<script>location.href='/gauchada/index.php'</script>";
	} else if ($sinCumplir==1){
			echo "<script> alert ('No es posible borrar su cuenta en este momento. Debe cumplir las gauchadas pendientes.') </script>";
			echo "<script>location.href='/gauchada/index.php'</script>";
	}
?>