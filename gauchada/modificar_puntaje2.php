<?php

include("conexion.php");
 $link=conectar();


$idreputacion=$_POST['idreputacion']; //el name del input es idreputacion
$puntaje=$_POST['puntaje'];
$nombre2=$_POST['nombre2'];

$result=mysqli_query($link,"SELECT * FROM reputacion WHERE puntaje='$puntaje'");
  
    if(mysqli_num_rows($result)==1){

      
      echo '<script> alert("¡¡PUNTAJE REPUTACION EXISTENTE!!");</script>';
      echo '<script> window.location ="modificar_puntaje.php?categoria='.$idreputacion.'&nomcategoria='.$nombre2.'";</script>';

    }
    else{
      
      if($result){
        $query="UPDATE reputacion SET puntaje ='$puntaje'  WHERE idReputacion ='$idreputacion'";
        $result=mysqli_query($link,$query);

          //header("location:ver_categorias.php");
             echo '<script> alert("¡¡MODIFICACION EXITOSA!!");</script>';
             echo '<script> window.location ="ver_reputaciones.php";</script>';

      }
      else{
          echo '<script> alert("¡¡INTENTE NUEVAMENTE!!");</script>';
          echo '<script> window.location ="modificar_puntaje.php?categoria='.$idreputacion.'&nomcategoria='.$nombre2.'";</script>';
        }
     
    }
?>