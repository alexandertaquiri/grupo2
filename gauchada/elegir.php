<?PHP
		include("clases.php");
 		include("cabecera.php");
      $idpos=$_GET['postulacion'];
      $idp=$_GET['fila']; 
      //echo $idpos;
      //echo "hola";
      //echo $idp;
      include("conexion.php");
      

      $con=conectar();

       $resul=mysqli_query($con,"SELECT idPublicacion  FROM elige  WHERE idPublicacion='$idp' ");//verificamos si ya eleji a un postulante uso el idpublicacion para referirme a esa gauchada

        if(mysqli_num_rows($resul)>=1){//si ya eleji   a un postulante ya no eligo a nadie mas
            echo '<script> alert("YA ELIGIO A UN POSTULANTE PARA ESTA GAUCHADA");</script>';
           echo '<script> window.location ="ver_postulantes.php?postulacion='.$idpos.'&fila='.$idp.'";</script>';
        }
        else{
               $result2=mysqli_query($con,"INSERT INTO elige (idPublicacion,idPostulacion)values('$idp','$idpos')");
               echo '<script> alert ("SE ELIGIO A UN POSTULANTE"); </script>';
               echo '<script> window.location ="ver_postulantes.php?postulacion='.$idpos.'&fila='.$idp.'";</script>';
               }
         mysqli_close($con);
       
      
 	?>