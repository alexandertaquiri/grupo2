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


$idreputacion=$_GET['categoria'];

include_once("conexion.php");
$link = conectar();
$query= "SELECT * FROM reputacion WHERE idreputacion='$idreputacion
'";
$result=mysqli_query($link,$query);
$num=mysqli_num_rows($result);
 $row = mysqli_fetch_array($result);
?>
<script type="text/javascript" src="java/verificacion_backend.js"></script>

<title> MODIFICAR REPUTACION </title>	
</head>
<body >
<div id="ingresar">
    <div class="wrapper">
    	
    	
         <div id="wrapper">
            <form name="formulario" action="modificar_puntaje2.php" class="login-form" method="POST" onsubmit="">
                    <div class="header">
                       <h1>MODIFICAR PUNTAJE DE REPUTACION</h1>
                      
                    </div>
                    <div class="content">
                    	    <input type="hidden" name="idreputacion" value='<?php echo "$idreputacion"; ?>'></br>
                            <input type="hidden" name="nombre2" value='<?php echo "$row[categoria]"; ?>'></br>  
                            <label for="nombre">Puntaje de la Reputacion:</label>
                            <input type="number" name="puntaje" class="input username"  required="required" size="25"
                             value=<?php echo"$row[puntaje]";?>></br></br>
                           
                    </div>
                    <div class="footer">
                          <input type="submit" name="modificar" value="Modificar" class="button" />
               
                    </div>
                 
            </form>
         </div>   
     
    </div>
<div>    
</body>
</html>