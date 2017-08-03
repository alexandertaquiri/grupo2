<?php
	/*Crea una nueva publicación y decrementa en uno el saldo actual*/
    session_start();
    include("connectDataBase.php");

    $con = connect();
    $usId = $_SESSION['id']; 
   
    $res = mysqli_query($con,"SELECT email FROM usuarios WHERE idUsuario<>'$usId'");
    //$row = mysqli_fetch_array($res);
    
    $outp = array();
    $outp = $res->fetch_all(MYSQLI_ASSOC);


    echo json_encode($outp);

?>