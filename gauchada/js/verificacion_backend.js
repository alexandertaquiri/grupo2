function verificarModificarProducto()
{   
	if ((document.formulario.nombre.value.length == 0))
	{
		alert("NO INGRESO UN NOMBRE DE PRODUCTO");
		document.formulario.nombre.focus();
		// sino se cumple la condicion
		return false;
	}
	
		 else{
		  		 if (document.formulario.vencimiento.value.length == 0)
		         {
				       alert("NO INGRESO UNA FECHA DE VENCIMIENTO");
				     document.formulario.vencimiento.focus();
				        //sino se cumple la condicion
				      return false;
		         }
		         else{
             	      if (document.formulario.descripcion.value.length == 0)
		     	       {
		     		     alert("EL PRODUCTO DEBE TENER UNA DESCRIPCION");
			    	     document.formulario.descripcion.focus();
			    	      // sino se cumple la condicion
			    	     return false;
			  	        }
			  
		              else{
		                   if (document.formulario.precio.value.length == 0 )
		                   {
		        	           alert("ERROR!! INGRESE UN PRECIO AL PRODUCTO");
		        	           document.formulario.precio.focus();
		        	           return false;
		                   }
		                  else{

		   	                   if((document.formulario.imagen.value.length > 0)) {
		   	                    if (!(/.(jpeg|jpg|png)$/i.test(document.formulario.imagen.value))) 
		   	                   {

		   	     	             alert("SELECCIONE UNA IMAGEN");
		   	     	             document.formulario.imagen.focus();
		   	     	             return false;
		   	                    } }  
				               else{
					              alert("LOS DATOS SE INGRESARON CORRECTAMENTE");
				                   return true;
				                }
			                }
		                }
			        }
                
            }
}

function verificarAgregarProducto()
{   
	if ((document.formulario.nombre.value.length == 0))
	{
		alert("ERROR!! NO INGRESO UN NOMBRE DE PRODUCTO");
		document.formulario.nombre.focus();
		// sino se cumple la condicion
		return false;
	}
	
		 else{
		  		 if (document.formulario.precio.value.length == 0)
		         {
				       alert("ERROR!! NO INGRESO UNA PRECIO");
				     document.formulario.precio.focus();
				        //sino se cumple la condicion
				      return false;
		         }
		         else{
             	      if (document.formulario.descripcion.value.length == 0)
		     	       {
		     		     alert("ERROR!! SU PRODUCTO DEBE CONTENER UNA DESCRIPCION.");
			    	     document.formulario.descripcion.focus();
			    	      // sino se cumple la condicion
			    	     return false;
			  	        }
			  
		              else{
		                   if (document.formulario.vencimiento.value.length == 0 )
		                   {
		        	           alert("ERROR!! EL PRODUCTO DEBE TENER UNA DE VENCIMIENTO");
		        	           document.formulario.vencimiento.focus();
		        	           return false;
		                   }
		                  else{

		   	                   if((document.formulario.imagen.value.length == 0) || (!(/.(jpeg|jpg|png)$/i.test(document.formulario.imagen.value)))) 
		   	                   {

		   	     	             alert("SELECCIONE UNA IMAGEN");
		   	     	             document.formulario.imagen.focus();
		   	     	             return false;
		   	                    }   
				               else{
					              alert("LOS DATOS SE INGRESARON CORRECTAMENTE");
				                   return true;
				                }
			                }
		                }
			        }
                
            }
}

function altacategoria(){
	if ((document.formulario.categoria.value.length == 0))
	{
		alert("ingrese el nombre de la nueva categoria de  producto");
		document.formulario.categoria.focus();
		// sino se cumple la condicion
		return false;
	}
	else{
		
	    return true;
	}
}
function verificarCategoria(){
	if ((document.formulario.nombre.value.length == 0))
	{
		alert("INGRESE UNA CATEGORIA");
		document.formulario.nombre.focus();
		// sino se cumple la condicion
		return false;
	}
	else{
		
	    return true;
	}

}