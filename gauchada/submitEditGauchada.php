<?php
	/*Crea una nueva publicación y decrementa en uno el saldo actual*/
    session_start();
    include("connectDataBase.php");

    $con = connect();
    $pubId = $_GET['id'];

    $title = $_POST['title'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imgType = ($_FILES['image']['type']).str_replace("imgs/", "", $image);
    $city = $_POST['city'];
    $fcad = $_POST['exp'];
    $category = $_POST['cat'];
    $message = $_POST['message'];

	mysqli_query($con, "UPDATE publicacion
                        SET idCategoria='$category', titulo='$title', ciudad='$city', descripcion='$message', caducidad='$fcad', imagen='$image', tipoimagen='$imgType'
                        WHERE idPublicacion='$pubId'");

?>