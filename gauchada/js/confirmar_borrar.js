function confirmarCategoria()
      {
            if( confirm("¿ESTA SEGURO QUE DESEA BORRAR ESTA CATEGORIA?"))
                { location.href='borrar_categoria.php';
                   return true;}
            else
            	return false;
                

      }