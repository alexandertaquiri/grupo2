<html>
	<head>
	<?php
		include("clases.php");
		include("cabecera.php");
	?>  
	<script type="text/javascript" src="js/registrar.js"></script>

		<title> Ingresar a mi cuenta </title>
	</head>
	<body id="ingresar">
	
      
      
      <div id="wrapper">
         
      	<form name="formulario2" action="buscarUsuario.php" class="login-form" method="post" onsubmit="return validarusu();" >
         
			<div class="header">
               <h1>Recuperar contraseña</h1>
            </div>
		 
		 <div class="content">
      		<label for="usuario">Usuario:</label>
      		<input type="email" name="usuario" class="input username"  required="required" size=25></br></br>
            </div>
            <div class="footer">
               <input type="submit" name="recuperar" value="Recuperar mi contraseña" class="button" />
               
            </div>
      		
      	</form>
          
      </div>      

</body>
</html>