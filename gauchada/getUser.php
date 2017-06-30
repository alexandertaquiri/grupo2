<?php
	session_start();
    include_once("connectDataBase.php");

    $conn = connect();
    $usId = $_SESSION['id'];
    
    $result=mysqli_query($conn,"SELECT nombre,apellido,dni,edad,direccion,telefono,email,puntos,clave FROM usuarios WHERE idUsuario=$usId");
	
	$row=mysqli_fetch_array($result);
	echo json_encode($row);
?>