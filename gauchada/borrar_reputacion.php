<?php
    include("conexion.php");
    $link=conectar();

    $idreputacion=$_GET['categoria'];// $idcategoria es la variable del valor de idcategoria q le envio  en el archivo ver_categoria eliminar
     
    
    $query="DELETE FROM reputacion WHERE reputacion.idReputacion ='$idreputacion'";
    $resultado=mysqli_query($link,$query);
    //header("location:ver_reputaciones.php"); // para visualizar las actuales categorias que s edio de alta.
    echo'<script> alert(SE ELIMINO LA REPUTACION EXITOSAMENTE!); </script>';
    //echo' <script> window.location="ver_reputaciones.php"; </script>';
    header("location:ver_reputaciones.php");
    

mysqli_close($link);
?>
