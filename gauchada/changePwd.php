<?php
    session_start();
    include("connectDataBase.php");

    $con = connect();
	$usId = $_SESSION['id'];

	$key = $_GET['key'];

    mysqli_query($con,"UPDATE usuarios SET clave='$key' WHERE idUsuario='$usId'");

?>