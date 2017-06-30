<?php
        
        Include("conexion.php");
        $con=conectar();
        $idUser = $_POST['idUsuario'];
        $idPub = $_POST['idPublicacion'];
    //averiguar si el usuario trata de postularse a su propia publicacion
    $consulta = "SELECT * FROM comenta WHERE idPublicacion='$idPub'";

    $resultado=mysqli_query($con,$consulta);

    $a=mysqli_fetch_array($resultado);
              
            ?>
                    <link rel="stylesheet" type="text/css" href="css/estilos.css">
                    <form name="formu" action="" class="login-form" method="post">
                     
                        <div class="header">
                           <h1><?php echo $a['comentario'];?></h1>
                        </div>
                     
                        <div class="content">
                            <label for="coment">Respuesta:</label>
                            <textarea type="input" maxlength="160" rows="10" name="coment" class="input"  required="required" size=25></textarea></br></br>
                            
                            <input type="hidden" name="idPublicacion" value= <?php echo "$idPub"; ?> >
                        </div>
                        
                        <div class="footer">
                           <input type="submit" name="send" value="Enviar" class="button" />
                        </div>
                    
                    </form>
        <?php
?>