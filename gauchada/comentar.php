<html>
<head>
<?PHP

include("clases.php");
include("cabecera.php");
$id = $_GET['idPublicacion'];

?>  
<script type="text/javascript" src="js/registrar.js"></script>

	<title> Hacer un comentario </title>
</head>
<body id="ingresar">
<div class="wrapper">
      
      
      <div id="wrapper">
        <form name="formulario2" action="alta_comentario.php" class="login-form"  method="POST" enctype="multipart/form-data">  
                <div class="header">
               		<h1>Deja tu comentario</h1>
               		<textarea type="text" name="comentar"  required="required" rows="4" cols="50"></textarea>
           		 </div>
           		  
    				 <input type="hidden" name="idpublicacion"   value='<?php echo" $id";?>' >
     				
     				
  					 
  				  
  				  <div class="footer">
              		 <input type="submit" name="Ingresar" value="Enviar" class="button" />    
                  </div>	 
				</form>
      </div>      

</body>
</html>				