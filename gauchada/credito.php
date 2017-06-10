<?php
include("clases.php");  
    
include("conexion.php");
session_start();

    $monto=$_POST['credito']; 
   
    $con=conectar();
    $id=$_SESSION['id'];
    
    
     $resul2=mysqli_query($con,"SELECT monto , idUsuario FROM credito  WHERE idUsuario='$id'");
     
     if(mysqli_num_rows($resul2)==1){//el numero de filas es igual
       $row = mysqli_fetch_array($resul2);
       //$credito=$row['idCredito'];
       $actual=$row['monto'];
       $actual=$actual + $monto;
      

       $query="UPDATE credito SET  monto='$actual' WHERE idUsuario='$id'";
       $resul=mysqli_query($con,$query);

     }
    /* else{
      $query2="INSERT INTO credito (monto,idUsuario)values('$monto','$id')";
      $resul2=mysqli_query($con,$query2);
     }*/

    //actualizar su credito   
   // $query="UPDATE credito SET  monto='$actual' WHERE credito.idUsuario='$id'";
    //$resul=mysqli_query($con,$query);

        

if($resul2){  //SE INGRESO CORRECTAMENTE
     
    header("Location:index.php");
      }
    
else{
          echo '<script> alert("NO PUDO COMPRAR CREDITO");</script>';
          echo '<script> window.location ="index.php";</script>';
        }   
?>