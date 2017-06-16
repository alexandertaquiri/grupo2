<?php
    session_start();
    include("connectDataBase.php");

    $conn = connect();
    $catgs = array();
    $result=mysqli_query($conn,"SELECT * FROM categoria");
    while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row["idCategoria"].'">'.$row["nombre"].'</option>';
    }
?>