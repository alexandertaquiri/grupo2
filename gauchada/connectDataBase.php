<?php
	function connect() {
		$host = "localhost";
		$user = "root";
		$psw = "";
		$db = "grupo2";
		$con = mysqli_connect($host,$user,$psw)or die("Server Connection Failed");
	  	mysqli_select_db($con, $db) or die("DataBase Connection Failed");
	  	return $con;
	}
?>