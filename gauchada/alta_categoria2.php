<?php
include("cabecera.php");
include("clases.php");
try{
$login = new Login;
$ok=$login->autorizar();
}
catch(Exception $e){
	 $mensaje= $e->getMessage();
   header("Location:index.php?msj='$mensaje'");
}
?>
<head>
 <script type="text/javascript" src="js/confirmar_borrar.js"></script>
 </head>
<body>

<div id="container">
<?php

$categoria=$_POST['categoria'];
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function validarcampos(){
	 
   $categoria=test_input($_POST['categoria']);//tirm elimima espacios
    
   $patron1=("/^[a-z]+$/i");
   $nvalido=("/\d/");
   if(isset($_POST['agregar'])){
        if ($categoria=='' || (preg_match($nvalido, $categoria))){
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
include("conexion.php");
  $con=conectar();

  $result=mysqli_query($con,"SELECT * FROM categoria WHERE nombre ='$categoria'");//consultar si existe la categoria
  if(mysqli_num_rows($result)==1){//ya existe la categoria;
      echo '<script> alert("YA EXISTE  LA CATEGORIA")</script>';
     
      echo'<script> window.location ="alta_categoria.php";</script>';
  }
  else{
      if($result){
        $query="INSERT INTO categoria (nombre) VALUES('$categoria')";//inserta la nueva categoria de pubñicacion a la tabla categorias
        $resultado=mysqli_query($con,$query);
        echo '<script> alert (" LA CATEGORIA DE GAUCHADA SE AGREGO CORRECTAMENTE")</script>';
        //header("location:ver_categorias.php");
         echo '<script> window.location ="ver_categorias.php";</script>';
      }
      else{
        echo '<script> alert ("INTENTE NUEVAMENTE") </script>';
        echo '<script> window.location ="alta_categoria.php";</script>';

      }
      mysqli_free_result($resultado);
      mysqli_close($con);
  }
 }
 else {
      //echo '<script> alert ("INTENTE NUEVAMENTE"); </script>';
            echo '<script> window.location ="alta_categoria.php";</script>';  

     }  
  
?> 

