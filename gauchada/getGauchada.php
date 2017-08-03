<?php
	session_start();
    include_once("connectDataBase.php");

    $conn = connect();
    $pubId = $_GET['id'];
    
    $result=mysqli_query($conn,"SELECT p.titulo,p.ciudad,p.descripcion,p.caducidad,c.nombre FROM publicacion p INNER JOIN categoria c ON p.idCategoria=c.idCategoria WHERE idPublicacion=$pubId");
	
	$row=mysqli_fetch_array($result);
	echo json_encode($row);
?>