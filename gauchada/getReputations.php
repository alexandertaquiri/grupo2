<?php
	/*Crea una nueva publicación y decrementa en uno el saldo actual*/
    session_start();
    include("connectDataBase.php");

    $con = connect();
   
    $res = mysqli_query($con,"SELECT categoria, puntaje FROM reputacion");
    //$row = mysqli_fetch_array($res);
    
    $outp = array();
    $outp = $res->fetch_all(MYSQLI_ASSOC);


    echo json_encode($outp);

?>