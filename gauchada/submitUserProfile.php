<?php
	/*Crea una nueva publicación y decrementa en uno el saldo actual*/
    session_start();
    include("connectDataBase.php");

    $con = connect();
    $usId = $_SESSION['id'];


    $name = $_POST['name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imgType = ($_FILES['image']['type']).str_replace("imgs/", "", $image);
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $user = $_POST['user'];
    $dni = $_POST['dni'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

	mysqli_query($con, "UPDATE usuarios
                        SET nombre='$name', apellido='$lastname', dni='$dni', edad='$age', direccion='$address', telefono='$phone', email='$user', foto='$image', tipoimagen='$imgType'
                        WHERE idUsuario='$usId'");

?>