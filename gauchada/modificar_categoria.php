<html>
<head>
<?php 
include("cabecera.php");
include("clases.php");

try{
$login = new Login;
$ok=$login->autorizar();
}
catch(Exception $e){
	 $mensaje= $e->getMessage();
   header("Location:index.php?msj='$mensaje'");
}


$idcategoria=$_GET['categoria'];

include_once("conexion.php");
$link = conectar();
$query= "SELECT * FROM categoria WHERE idCategoria='$idcategoria'";
$result=mysqli_query($link,$query);
$num=mysqli_num_rows($result);
 $row = mysqli_fetch_array($result);
?>
<script type="text/javascript" src="java/verificacion_backend.js"></script>
<link href="css/userProfile.css" rel="stylesheet">
<title> MODIFICAR CATEGORIAS DE GAUCHADA </title>	
</head>
<body  class="bg">
<div id="ingresar">
    <div class="wrapper">
    	
    	
         <div id="wrapper">
            <form name="formulario" action="modificar_categoria2.php" class="login-form" method="post" onsubmit="">
                    <div class="header">
                       <h1>GATEGORIA A MODIFICAR: <?PHP echo"$row[nombre]"; ?></h1>
                    </div>
                    <div class="content">
                    	    <input type="hidden" name="idcategoria" value='<?php echo "$idcategoria"; ?>'></br>
                            <input type="hidden" name="nombre2" value='<?php echo "$row[nombre]"; ?>'></br>  
                            <label for="nombre">Ingrese un Nombre:</label>
                            <input type="text" name="nombre" class="input username"  required="required" size="25"></br></br>
                    </div>
                    <div class="footer">
                          <input type="submit" name="modificar" value="modificar" class="button2" />
               
                    </div>
                 
            </form>
         </div>   
     
    </div>
<div>    
</body>
</html>