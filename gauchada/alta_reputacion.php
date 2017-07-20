<html>
<head>
<?php 
include("cabecera.php");
include("clases.php");

try{
$login = new Login();
$ok=$login->autorizar();
}
catch(Exception $e){
	 $mensaje= $e->getMessage();
   header("Location:index.php?msj='$mensaje'");
}
include("conexion.php");
$link=conectar();
?>
<script type="text/javascript" src="java/verificacion_backend.js"></script>

<title> ALTA REPUTACION DE GAUCHADA</title>	
</head>
<body  id="ingresar">

<div class="wrapper">
	
  <div id="wrapper">
	  <form name="formulario" action="alta_reputacion2.php" class="login-form" method="POST" onsubmit="">
	    	    
	    	    <div class="header">
                  <h1>AGREGAR UNA REPUTACION</h1>
                </div> 
                <div class="content">
                    <label>Ingrese una reputacion</label>
		            <input type="text" name="categoria" class="input username" required="required" size="40"></br></br>
		            <label>Ingrese un puntaje</label>
		            <input type="number" name="puntaje" class="input username" required="required" size="20"></br></br>
		        </div> 
		         <div class="footer">
                   <input type="submit" name="agregar" value="submit" class="button">
               
                 </div>   
	      
	    </form>
    </div>

</div>
</body>
</html>