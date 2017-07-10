<?php
	$email=$_POST['usuario'];
	include("clases.php");
	include("conexion.php");
	$link = conectar();
	
	$consulta="SELECT usuarios.clave
				FROM usuarios
				WHERE usuarios.email='$email' ";
				
	//busco al usuario con dicho mail
	$res=mysqli_query($link, $consulta);
	
	$consulta2="UPDATE usuarios
				SET clave='777777'
				WHERE usuarios.email='$email' ";
				
	
	
	
	//si encuentro un usuario
	if(mysqli_num_rows($res)==1){
		//cambio la clave
		mysqli_query($link, $consulta2);
		echo "<script>alert (' Se ha enviado su nueva clave a $email ');</script>";
		echo "<script>location.href='/gauchada/ingresar.php'</script>";
	}else{
		echo "<script>alert (' El mail ingresado no se encuentra registrado ');</script>";
		echo "<script>location.href='/gauchada/recuperarClave.php'</script>";
	}
?>