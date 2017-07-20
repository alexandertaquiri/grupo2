function confirmarCategoria()
      {
            if( confirm("¿ESTA SEGURO QUE DESEA BORRAR ESTA CATEGORIA?"))
                { location.href='borrar_categoria.php';
                   return true;}
            else
            	return false;
                

      }
function confirmarReputacion()
      {
            if( confirm("¿ESTA SEGURO QUE DESEA BORRAR ESTA REPUTACION?"))
                { location.href='borrar_reputacion.php';
                   return true;}
            else
            	return false;
                

      }