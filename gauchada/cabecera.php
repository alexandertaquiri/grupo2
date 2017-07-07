<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 5 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<?php
	session_start();
	include("checkCredit.php");
?>
<html lang="es">
<head> 
	<meta http-equiv="Content-Type" content="text/html" charset=UTF-8"/>
	<style type="text/css"></style>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	  
</head>

<body>
	<div id="header">
		<?php
			if(isset($_SESSION['estado'])){
      	  		 if($_SESSION['estado']=="logeado"){

                        if($_SESSION['rol']=="1"){
                        	echo"<h3><a href=index.php><img id=inicio src=imgs/logo2.jpg></a> | 
      	           	             Hola Administrador ".$_SESSION['nombre']." ! | <a href=salir.php>cerrar sesion</a></h3>";

                        ?>	
                        	<nav>
					        	<ul>
					        		<li>
					        			<a href=userProfile.php> MI PERFIL </a>

					        		</li>
					        		<li><a href="">MIS FUNCIONES</a>
      
								  		<div>
								  			<ul>
								  				<!-- <li><a href="mis_publicaciones.php">VER POSTULANTES</a></li> -->
								  				
												<li><a href="alta_categoria.php">ALTA CATEGORIA</a></li>
								                <li><a href="ver_categorias.php">VER CATEGORIAS</a></li>
												<li><a href=" "></a></li>
								  				
								  			</ul>
								  		</div>
  		                            </li>			        		
					        	</ul>
					        </nav>		
        <?php
                        }
                        else{

							if(hasCredit()) {
								$elm="<li><a href='postGauchadaForm.php'><strong>+</strong> PUBLICAR</a></li>";
							} else {
								$elm="<li><a id='msg' href=''><strong>+</strong> PUBLICAR</a></li>";
							}
				      	  			 echo"
							<h3><a href=index.php><img id=inicio src=imgs/logo2.jpg></a> | 
	      	           	     Hola ".$_SESSION['nombre']." ! | <a href=salir.php>cerrar sesion</a></h3>";
	    ?>
	      	           	 <!--echo"-->
	      	           	 		<nav>
						        	<ul>
						        		<li>
						        			<a href=userProfile.php> MI PERFIL </a>

						        		</li>
						        		<li><a href="mis_publicaciones.php">MIS PUBLICACIONES</a>
	      
									  		<div>
									  			<ul>
									  				<!-- <li><a href="mis_publicaciones.php">VER POSTULANTES</a></li> -->
									  				<li><a href="misPostulaciones.php">MIS POSTULACIONES</a></li>
													<li><a href="misElegidos.php">MIS CALIFICACIONES DADAS</a></li>
									                <li><a href="misCalificaciones.php">MIS CALIFICACIONES RECIBIDAS</a></li>
													<li><a href=" "></a></li>
									  				
									  			</ul>
									  		</div>
	  		                            </li>
						        		<?php echo "$elm";?>

						        		<li>
						        			<a href=buyPointsForm.php> COMPRAR CREDITO</a>
						        		</li>					        		
						        	</ul>
						        </nav>		
			<?php
			                }
		            }
	            }
			    else{ 
			    	echo"<h3><a href=index.php><img id=inicio src=imgs/logo2.jpg></a> | <a href=ingresar.php>INGRESAR</a> |<a href=registrar.php> REGISTRARSE</a></h3>";}


		?>
        <img id="logosan" src="imgs/gaucho2.jpg">

         

	</div>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    <script src="js/postGauchadaForm.js"></script>
</body>
</html>