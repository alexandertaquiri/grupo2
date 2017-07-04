<?php
        
    Include("conexion.php");
    $con=conectar();
    $idUser = $_GET['idUsuario'];
    $idPub = $_GET['idPublicacion'];
    $us2 = $_GET['idUs2'];

    $consulta = "SELECT * FROM comenta WHERE idPublicacion='$idPub'";

    $resultado=mysqli_query($con,$consulta);

    $a=mysqli_fetch_array($resultado);
              
            ?>
                    <link rel="stylesheet" type="text/css" href="css/estilos.css">
                    <form name="formu" action="submitReply.php" class="login-form" method="post">
                     
                        <div class="header">
                           <h1><?php echo $a['comentario'];?></h1>
                        </div>
                     
                        <div class="content">
                            <label for="reply">Respuesta:</label>
                            <textarea type="input" maxlength="160" rows="10" name="reply" class="input" required="required" size=25></textarea></br></br>
                            <input type="hidden" name="idUsuario" value= <?php echo "$idUser"; ?> >
                            <input type="hidden" name="idPublicacion" value= <?php echo "$idPub"; ?> >
                            <input type="hidden" name="idUs2" value= <?php echo "$us2"; ?> >
                        </div>
                        
                        <div class="footer">
                           <input type="submit" name="send" value="Enviar" class="button" />
                        </div>
                    
                    </form>
        <?php
?>