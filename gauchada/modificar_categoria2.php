<?php

include("conexion.php");
 $link=conectar();


$idcategoria=$_POST['idcategoria']; //el name del input es idcategoria 
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

$result=mysqli_query($link,"SELECT * FROM categoria WHERE nombre='$nombre'");
  
    if(mysqli_num_rows($result)==1){

      
      echo '<script> alert("¡¡CATEGORIA EXISTENTE!!");</script>';
      echo '<script> window.location ="modificar_categoria.php?categoria='.$idcategoria.'&nomcategoria='.$nombre2.'";</script>';

    }
    else{
      
    if($result){
        $query="UPDATE categoria SET nombre ='$nombre' WHERE idCategoria ='$idcategoria'";
          $result=mysqli_query($link,$query);

          //header("location:ver_categorias.php");
             echo '<script> alert("¡¡MODIFICACION EXITOSA!!");</script>';
             echo '<script> window.location ="ver_categorias.php";</script>';

      }
    else{
          echo '<script> alert("¡¡INTENTE NUEVAMENTE!!");</script>';
          echo '<script> window.location ="modificar_categoria.php?categoria='.$idcategoria.'&nomcategoria='.$nombre2.'";</script>';
        }
     mysqli_free_result($result);
     mysqli_close($link);   

    }
}//cierro la funcion 
else{
          //echo '<script> alert("¡¡INTENTE NUEVAMENTE!!");</script>';
          echo '<script> window.location ="modificar_categoria.php?categoria='.$idcategoria.'&nomcategoria='.$nombre2.'";</script>';
        }   
  
?>