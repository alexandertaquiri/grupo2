<?php

	/*************************************************
		Elimina la gauchada seleccionada. 
		SI nadie se postulo, devuelve el credito.
		SI tiene postulantes, no lo devuelve.
		SI tiene elegidos, no puede ser eliminada.
	**************************************************/

	session_start();
	include("clases.php");
	include("conexion.php");
	$link = conectar();
	
	$idPub = $_GET['idPublicacion'];
	$idUser = $_GET['idUser'];

	//en elegido habra una fila en caso de haber elegido a un usuario o cero en caso contrario
	$elegido = "SELECT * FROM elige WHERE idPublicacion = $idPub";
	$elegido = mysqli_query($link, $elegido);
	$numElegidos = mysqli_num_rows($elegido);

	//en postulantes habra filas en caso de que un usuario se hay postulado, o cero en caso contrario
	$postulantes = "SELECT * FROM postulacion WHERE idPublicacion = $idPub";
	$postulantes = mysqli_query($link, $postulantes);
	$numPostulantes = mysqli_num_rows($postulantes);


	//si hay elegido, no puedo eliminar la gauchada
	if($numElegidos != 0){
		echo "<script> alert ('No es posible eliminar la gauchada, por que ya hay un usuario elegido.') </script>";
		echo "<script>location.href='/gauchada/mis_publicaciones.php'</script>";
	}
		//si hay postulantes, aviso que no se devuelve el credito y doy la opcion de continuar o no
	else if($numPostulantes != 0){
		echo "<script> 
				confirmar=confirm('Esta GAUCHADA tiene postulantes, por lo que el crédito no será devuelto. Eliminar de todas formas?'); 
    			if (confirmar) {
	        		alert('La GAUCHADA ha sido eliminada.');
	        		location.href='/gauchada/eliminarGauchada.php?idPub=$idPub';
    			} else { 
	    			alert('La GAUCHADA no fue eliminada.');
	    			location.href='/gauchada/mis_publicaciones.php';
				  }
			</script>";
	} 
	// la gauchada no tenia postulantes, por lo que borro y devuelvo el credito
	else{ 
		echo "<script> 
				confirmar=confirm('Está seguro de que quiere eliminar esta GAUCHADA?'); 
    			if (confirmar) {
	        		alert('La GAUCHADA ha sido eliminada. Se ha devuelto un crédito a su cuenta.');
	        		location.href='/gauchada/eliminarGauchada2.php?idPub=$idPub&idUser=$idUser';
    			} else {
    					alert('La GAUCHADA no fue eliminada.');
    					location.href='/gauchada/mis_publicaciones.php';
    			  }
			</script>";
		}
?>