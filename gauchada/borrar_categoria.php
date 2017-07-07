<?php
    include("conexion.php");
    $link=conectar();

    $idcategoria=$_GET['categoria'];// $idcategoria es la variable del valor de idcategoria q le envio  en el archivo ver_categoria eliminar
     
    $query="SELECT * FROM publicacion
    INNER JOIN  categoria  c ON c.idCategoria=publicacion.idCategoria
     WHERE c.idCategoria='$idcategoria' "; // ver si la publicacion tiene categoria
   
    $resultado=mysqli_query($link,$query); 

if($resultado){
    $num=mysqli_num_rows($resultado);

    if ($num==0) { //no tiene categoria la publicacion
       $query="DELETE FROM categoria WHERE categoria.idCategoria ='$idcategoria'";
       
       $resultado=mysqli_query($link,$query);
       header("location:ver_categorias.php"); // para visualizar las actuales categorias que s edio de alta.
    }
    else{
       echo'<script> alert("ESTA CATEGORIA POSSE PUBLICACION, NO SE PUEDE ELIMINAR");</script>';
       echo' <script>  window.location="ver_categorias.php"; </script>';
      }
    mysqli_free_result($resultado);
}
else{   echo'<script> alert(Hubo un error); </script>';
        echo' <script> window.location="ver_categorias.php"; </script>';
}

mysqli_close($link);
?>
