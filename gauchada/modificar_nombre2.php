<?php

include("conexion.php");
 $link=conectar();


$idreputacion=$_POST['idreputacion']; //el name del input es idreputacion
$nombre=$_POST['nombre'];
$nombre2=$_POST['nombre2'];


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validarcampos(){
  
 $nombre=test_input($_POST['nombre']);//tirm elimima espacios
    
   $patron1=("/^[a-z]+$/i");
   $nvalido=("/\d/");
   if(isset($_POST['modificar'])){
        if (preg_match($nvalido, $nombre)){
            echo"<script> alert('INGRESE UNA CATEGORIA VALIDA');</script>";
            return false; 
        }

        else {
              return true;
           }                         
    }
   else {echo'<script> alert( "LOS DATOS INGRESADOS NO SON VALIDOS");</script>';}   
}


if(validarcampos()==true){
   
    
    $result=mysqli_query($link,"SELECT * FROM reputacion WHERE categoria='$nombre'");
  
    if(mysqli_num_rows($result)==1){

      
      echo '<script> alert("¡¡NOMBRE REPUTACION EXISTENTE!!");</script>';
      echo '<script> window.location ="modificar_nombre.php?categoria='.$idreputacion.'&nomcategoria='.$nombre2.'";</script>';

    }
    else{
      
      if($result){
        $query="UPDATE reputacion SET categoria ='$nombre'  WHERE idReputacion ='$idreputacion'";
          $result=mysqli_query($link,$query);

          //header("location:ver_categorias.php");
             echo '<script> alert("¡¡MODIFICACION EXITOSA!!");</script>';
             echo '<script> window.location ="ver_reputaciones.php";</script>';

      }
    else{
          echo '<script> alert("¡¡INTENTE NUEVAMENTE!!");</script>';
          echo '<script> window.location ="modificar_nombre.php?categoria='.$idreputacion.'&nomcategoria='.$nombre2.'";</script>';
        }
     
    }
 }   

 else{
          echo '<script> alert("¡¡INTENTE NUEVAMENTE!!");</script>';
          echo '<script> window.location ="modificar_nombre.php?categoria='.$idreputacion.'&nomcategoria='.$nombre2.'";</script>';
     }   
?>