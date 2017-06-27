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

       $resul=mysqli_query($con,"SELECT idPublicacion  FROM elige  WHERE idPublicacion='$idp' ");//verificamos si hay un mail igual

        if(mysqli_num_rows($resul)>=1){//si existe un usuario con el mismo mail
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