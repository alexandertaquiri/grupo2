<?php
        
    Include("conexion.php");
    $con=conectar();
    $idUser = $_POST['idUsuario'];
    $idPub = $_POST['idPublicacion'];
    $idUs2 = $_POST['idUs2'];

    $resp = $_POST['reply'];

    mysqli_query($con,"UPDATE comenta SET respuesta='$resp' WHERE idPublicacion='$idPub' AND idUsuario='$idUs2'");

    echo "<script> alert('Respuesta enviada correctamente.') </script>";
    echo "<script>location.href='/gauchada/detalles.php?fila=".$idPub."'</script>";         
?>