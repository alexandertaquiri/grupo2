<?php
// se recibe el valor que identifica la imagen en la tabla
$id = $_GET['idUsuario'];

Include("conexion.php");
$link=conectar();
// se recupera la información de la imagen
$sql = "SELECT foto , tipoimagen
        FROM usuarios
        WHERE idUsuario=$id";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
mysqli_close($link);



// se imprime la imagen y se le avisa al navegador que lo que se está
// enviando no es texto, sino que es una imagen un tipo en particular
header("Content-type: image/".$row["tipoimagen"]);  
echo $row['foto'];
?>