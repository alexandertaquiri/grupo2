<?php
// se recibe el valor que identifica la imagen en la tabla

$id = $_POST['idpublicacion'];
$comenta=$_POST['comentar'];
session_start();


Include("conexion.php");
$link=conectar();
if(isset($_SESSION['estado'])){
    if($_SESSION['estado']=="logeado"){
      	 $iduser=$_SESSION['id']; //id esta definido en la clase//
         $sql = "INSERT INTO comenta (idPublicacion,comentario,idUsuario) values ('$id','$comenta','$iduser')";
         $result = mysqli_query($link, $sql);
         header("Location:index.php");

						//echo" <h3><a href='comentar.php?idPublicacion=".$row['idPublicacion']."'>¡Deseas dejar un comentario!</a></h3>";}}
    }
}
else{
   // echo" <p>¿necesitas registrarte? <a href='registrar.php'>¡Registrate!</a></p>";
	//echo" <p>¿tenes que ingresar a tu cuenta para comentar? <a href='ingresar.php'>¡Registrate!</a></p>";
   // echo '<script> alert("NECESITA REGISTRAR O ENTRAR A SU CUENTA");</script>';

     //header("Location:registrar.php");

     echo '<script> alert ("NO PUEDE HACER COMENTARIO, NECESITA INGRESAR A SU CUENTA"); </script>';
            echo '<script> window.location ="ingresar.php";</script>';


				 }	
//$sql = "INSERT INTO comenta (idPublicacion,comentario,idUsuario) values ('$id','$comenta','$iduser')";
//$result = mysqli_query($link, $sql);

mysqli_close($link);


?>