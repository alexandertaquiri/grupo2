<?php
	/*Crea una nueva publicación y decrementa en uno el saldo actual*/
    session_start();
    include("connectDataBase.php");

    $con = connect();
    $usId = $_SESSION['id'];
    $res = mysqli_query($con,"SELECT * FROM credito WHERE idUsuario=$usId"); 
    $row = mysqli_fetch_array($res);
    $am = $row['monto'];

    $title = $_POST['title'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imgType = ($_FILES['image']['type']).str_replace("imgs/", "", $image);
    $city = $_POST['city'];
    $fcad = $_POST['exp'];
    $category = $_POST['cat'];
    $message = $_POST['message'];

	mysqli_query($con, "INSERT INTO publicacion (idUsuario, idCategoria, titulo, ciudad, descripcion, caducidad, imagen, tipoimagen) VALUES ('$usId', '$category', '$title', '$city', '$message', '$fcad', '$image', '$imgType')");

    if ($am <= 0) {$am=0;}
	else {$am=$am-1;}
    mysqli_query($con,"UPDATE credito SET monto='$am' WHERE idUsuario='$usId'");  

?>