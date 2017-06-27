<html>
<head>
	<title>alta postulante</title>
	<?PHP
		include("clases.php");
 		include("cabecera.php"); 
 	?>
</head>
<body id="ingresar">
<div class="wrapper">
      
      
      <div id="wrapper">
         
      	<form name="formulario2" action="" class="login-form" method="post"  >
         
			<div class="header">
               <h1>ALTA POSTULANTE</h1>
            </div>
		 
		 <div class="content">
		 <input type="hidden" name="idpublicacion"   value='<?php echo" $id";?>' >
		 <input type="hidden" name="idpublicacion"   value='<?php echo" $id";?>' >
      		<label for="calificar">Calificar:</label>
      		<input type="text" name="calificar" class="input username"  required="required" size=4></br></br>
      		<label for="comentar">comentario:</label>
      		<input type="text"  name="comentar" required="required" class="input username" ></br></br>
      		<label for="replica">replica:</label>
      		<input type="text"  name="replica" required="required" class="input username"></br></br>
      		
            </div>
            <div class="footer">
               <input type="submit" name="elegir" value="elegir" class="button" />
               
            </div>
      		
      	</form>

      </div>      
</body>
</html>

