<?php
    session_start();
    include("connectDataBase.php");

    $con = connect();
	$usId = $_SESSION['id'];

	$res = mysqli_query($con,"SELECT * FROM credito WHERE idUsuario=$usId"); 
    $row = mysqli_fetch_array($res);
    $pts = $row['monto'];

    $bought = $_POST['points'];

    $pts = $pts + $bought;
    mysqli_query($con,"UPDATE credito SET monto='$pts' WHERE idUsuario='$usId'");
?>