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
<link href="css/userProfile.css" rel="stylesheet">
<title> ALTA CATEGORIA DE GAUCHADA</title>	
</head>
<body  class="bg" id="ingresar">

<div class="wrapper">
	
  <div id="wrapper">
	  <form name="formulario" action="alta_categoria2.php" class="login-form" method="post" onsubmit="">
	    	    
	    	    <div class="header">
                  <h1>AGREGAR UNA CATEGORIA</h1>
                </div> 
                <div class="content">
                    <label>Ingrese una categoria</label>
		            <input type="text" name="categoria" class="input username" required="required" size="40"></br></br>
		        </div> 
		         <div class="footer">
                   <input type="submit" name="agregar" value="agregar" class="button2" />
               
                 </div>   
	      
	    </form>
    </div>

</div>
</body>
</html>