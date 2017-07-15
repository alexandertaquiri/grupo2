<?php
function esMiGauchada($idUser, $idPub, $link){
	
	//averiguar si el usuario trata de postularse a su propia publicacion
	$consulta = "SELECT idUsuario FROM publicacion WHERE idPublicacion='$idPub'";

	$resultado=mysqli_query($link,$consulta);

	$filas=$resultado->num_rows;
	$a=mysqli_fetch_array($resultado);
	
	//idUsuario publicacion actual
	if($a['idUsuario']==$idUser){
		return true;
	}
	return false;
}

function mePostule($idUser, $idPub, $link){
	$consulta="SELECT * FROM postulacion WHERE idUsuario='$idUser' AND idPublicacion='$idPub'";
		
	$resultado=	mysqli_query($link, $consulta);
	$filas=$resultado->num_rows;			
			
	if($filas==0){
		return false;
	}
	return true;
}

?>