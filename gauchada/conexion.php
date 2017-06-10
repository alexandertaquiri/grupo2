<?php
//archivo conexion.php
function conectar(){
	$link=mysqli_connect('localhost','root','','grupo2')
	or die("Error". mysql_error($link));
	return $link;
}
?>