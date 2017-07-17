<?php
include("clases.php");  
    
include("conexion.php");
session_start();

    $n=$_POST['nombre'];
    $a=$_POST['apellido'];
    $ed=$_POST['edad'];
    $dni=$_POST['dni'];
    $e=$_POST['email'];
    $t=$_POST['telefono'];
    $p=$_POST['password1'];
    $dir=$_POST['direccion'];
   /* $imagen= $_FILES['imagen']['tmp_name'];
    $imagen2= file_get_contents("$imagen");
    $imagen2= addslashes($imagen2);
    $extension = $_FILES['imagen']['type'];
    $extension=str_replace("image/", "", $extension);
    $puntos=1;
    $rol=0;*/
   
    

        //validar......
    /*function validarcampos(){
      
    $nombre=trim($_POST['nombre']);//tirm elimima espacios
    $apellido=trim($_POST['apellido']);
    $email=trim($_POST['email']);
    $telefono=trim($_POST['telefono']);
    $p=trim($_POST['password1']);
    $p2=trim($_POST['password2']);
    $patron1=("/^[a-z]+$/i");
    $patron2=("/^\d{9}$/");
    $patron3=("/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/");

    if(isset($_POST['submit'])){
        if ($nombre== '' ||preg_match($patron1, $nombre)){
            echo'<script> alert("INGRESE UN NOMBRE");</script>';
        }
        else{
            if ($nombre=='' || preg_match(!$patron1, $apellido)){
                echo'<script> alert("INGRESE UN APELLIDO");</script>';
            }
            else{
                 if ($telefono=='' || preg_match(!$patron2,$telefono)){
                       echo'<script> alert("INGRESE UN TELEFONO");</script>';
                 }
                else{
                      if ($email=='' || preg_match(!$patron3, $email)){
                        echo'<script> alert(" INGRESE UN E-mail");</script>';
                       }
                      else{
                            if ($p=='' || $p2==''){
                               echo'<script> alert("LOS CAMPOS DE CONTRASEÃ‘A NO PUEDEN ESTAR VACIOS");</script>';
                            }
                           else{
                              if($p!=$p2){
                                 echo'<script> alert("LAS CONTRASEÃ‘AS DEBEN COINCIDIR");</script>';
                              }  
                              else{
                                   echo'<script> alert("LOS DATOS SON CORRECTOS");</script>';
                                }
                            }
                        }
                    }
                }
             }
    }
    else {echo'<script> alert( "LOS DATOS INGRESADOS NO SON VALIDOS");</script>';}
} //fin de la funcion validarcampos*/
       // validarcampos(); 
        $con=conectar();

        if(($_FILES['imagen']['size']) > 0){  //si el tamaño es 0 no se ah subido ninguna foto
  
            $imagen= $_FILES['imagen']['tmp_name']; //archivo temporal
            $imagen2= file_get_contents("$imagen");//leer el contenido de un archivo en una cadena.
            $imagen2=addslashes($imagen2); // agrega barra invertidas /

            $extension = $_FILES['imagen']['type'];
            $extension=str_replace("imgs/", "", $extension); //remplaza en la cadena "image/" por ""
          }


      
        $resul=mysqli_query($con,"SELECT email FROM usuarios  WHERE email='$e' ");//verificamos si hay un mail igual

        if(mysqli_num_rows($resul)==1){//si existe un usuario con el mismo mail
            echo '<script> alert("INGRESE OTRO MAIL");</script>';
            echo '<script> window.location ="registrar.php";</script>';

            //echo" existe usuario con el mismo mail ";
        }
        else{//si el usuario no existe se da de alta en la base de  datos;
          
            $query="INSERT INTO usuarios (nombre,apellido,email,telefono,edad,dni,direccion,puntos,rol,clave,foto,tipoimagen, credito)values('$n','$a','$e','$t','$ed','$dni','$dir','$puntos','$rol','$p','$imagen2','$extension', '1')";
            $resul5=mysqli_query($con,$query);

            $id=mysqli_insert_id($con);
    
           // $query2="INSERT INTO credito (monto,idUsuario)values('1','$id')";
           // $resul2=mysqli_query($con,$query2);
            

        }

if($resul5){  //SE INGRESO CORRECTAMENTE
     try{
     $login = new Login();
    $fila=$login->autentificar($con,$p,$e);
    header("Location:index.php");
      }
    catch(Exception $e){
    echo $e->getMessage();}


}
else{
          echo '<script> alert("NO SE PUDO CREAR SU CUENTA!! INTENTE NUEVAMENTE");</script>';
          echo '<script> window.location ="registrar.php";</script>';
        }   
?>