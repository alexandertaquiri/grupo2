<?php
	include("connectDataBase.php");
    $con = "";
    $usId = "";
    $res = ""; 
    $row = "";
    $am = "";

    function hasCredit() {
    	global $con, $usId, $res, $row, $am;
    	$con = connect();
    	$usId = $_SESSION['id'];
    	$res = mysqli_query($con,"SELECT * FROM credito WHERE idUsuario=$usId"); 
    	$row = mysqli_fetch_array($res);
    	$am = $row['monto'];
    	return $am > 0;
    }
?>