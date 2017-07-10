<?php
	include('conexion.php');
	$link=conectar();
	
	
	//Linea a modificar por el id del usuario (que se recibiria por parametro) del cual se desea conocer la reputacion
	$idUser = '24';
	
	//obtengo los puntos del usuario
	$puntosUser= "SELECT puntos
				  FROM usuarios
				  WHERE idUsuario='$idUser'";
				  
	$puntosUser = mysqli_query($link, $puntosUser);
	$filaPuntos=mysqli_fetch_array($puntosUser);
	//echo $filaPuntos['puntos'];
	$puntos=$filaPuntos['puntos'];
	
	//Busco el mayor puntaje que haya superado con mis puntos
	// si los puntos son positivos o negativos, debo cambiar la consulta
	if($puntos > 0){	
		$reputacionUser="SELECT MAX(puntaje)
						 FROM reputacion
						 WHERE $puntos >= puntaje";
	}
	else {
		$reputacionUser="SELECT MIN(puntaje)
						 FROM reputacion
						 WHERE $puntos <= puntaje";
	}
	$reputacionUser=mysqli_query($link, $reputacionUser);
	$filaReputaciones=mysqli_fetch_array($reputacionUser);
	
	//guardo el puntaje
	$puntajeReputacion=$filaReputaciones[0];
	
	//con el puntaje obtengo la categoria(nombre de la reputacion)
	$consultaReputacion="SELECT categoria
						 FROM reputacion
						 WHERE puntaje = '$puntajeReputacion'";
						 
	$consultaReputacion=mysqli_query($link, $consultaReputacion);
	$reputacion=mysqli_fetch_array($consultaReputacion);
	
	//Aca lo imprimo, pero podria enviarse a otro lado
	echo $reputacion['categoria'];
?>