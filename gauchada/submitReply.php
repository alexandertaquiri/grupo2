<?php
        
    Include("conexion.php");
    $con=conectar();
    $idUser = $_POST['idUsuario'];
    $idPub = $_POST['idPublicacion'];
	$id = $_GET['fila'];
    //averiguar si el usuario trata de postularse a su propia publicacion
    $consulta = "SELECT * FROM comenta WHERE idPublicacion='$idPub'";

    $resultado=mysqli_query($con,$consulta);
    $a=mysqli_fetch_array($resultado);

    $resp = $_POST['coment'];

    mysqli_query($con, "INSERT INTO comenta (respuesta) VALUES ('$resp')");
    echo "<script> alert('Respuesta enviada correctamente.') </script>";
    echo "<script>location.href='detalles.php?fila='.$id.' '</script>";            
?>