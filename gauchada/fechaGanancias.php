<!DOCTYPE html>
<html>
	<?php
		include('cabecera.php');
	?>
	<head>
		<title> Ingresar fechas </title>
		<link rel=stylesheet href="css/bootstrap.css" >
		<link rel=stylesheet href="css/estilos.css" type="text/css" media=screen>
	</head>

<body id="ingresar">
<div class="wrapper">      
      <div id="wrapper">
         
      	<form name="formulario2" action="reporteGanancias.php" class="login-form" method="post" >
         
			<div class="header">
               <h1>Ingresar fechas</h1>
            </div>
		 
		 	<div class="content">
	      		<label for="fecha1">Fecha Inicio:</label>
	      		<input type="date" name="fecha1" min="2017-07-01" class="input username"  required="required" size=25></br></br>
				<label for="fecha2">Fecha Fin:</label>
	      		<input type="date" name="fecha2" min="2017-07-01" class="input username"  required="required" size=25></br></br>
        	</div>
            <div class="footer">
               <input type="submit" name="Ingresar" value="Ingresar" class="button" />
               
            </div>
            
         </form>
      </div>      

</body>


</html>