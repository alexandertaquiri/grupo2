<?php
    session_start();
    include("connectDataBase.php");

    $con = connect();
	$usId = $_SESSION['id'];

	$res = mysqli_query($con,"SELECT credito FROM usuarios WHERE idUsuario=$usId"); 
    $row = mysqli_fetch_array($res);
    $pts = $row['credito'];

    $bought = $_POST['points'];

    $pts = $pts + $bought;
    mysqli_query($con,"UPDATE usuarios SET credito='$pts' WHERE idUsuario='$usId'");

    date_default_timezone_set("America/New_York");
    $date = date("Y-m-d");
    $price = $_POST['price'];
    //Guardar en el historial de compras.
    mysqli_query($con, "INSERT INTO compra (idUsuario, fecha, credito, monto) VALUES ('$usId', '$date', '$bought', '$price')");

?>