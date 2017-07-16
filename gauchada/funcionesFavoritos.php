<?php
function esMiFav($idUser, $idPub, $link){
	$consulta="SELECT * FROM favorito WHERE idUsuario='$idUser' AND idPublicacion='$idPub'";
		
	$resultado=	mysqli_query($link, $consulta);
	$filas=$resultado->num_rows;			
			
	if($filas==0){
		return false;
	}
	return true;
}
?>