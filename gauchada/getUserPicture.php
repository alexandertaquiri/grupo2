<?php
	session_start();
    include_once("connectDataBase.php");

    $conn = connect();
    $usId = $_SESSION['id'];
    
    $result=mysqli_query($conn,"SELECT foto, tipoimagen FROM usuarios WHERE idUsuario=$usId");
	
	$row = mysqli_fetch_array($result);


	// se imprime la imagen y se le avisa al navegador que lo que se está
	// enviando no es texto, sino que es una imagen un tipo en particular
	header("Content-type: image/".$row["tipoimagen"]);  
	echo $row['foto'];
?>