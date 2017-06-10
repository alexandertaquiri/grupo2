function confirmarProducto()
      {
            if( confirm("¿ESTA SEGURO QUE DESEA BORRAR ESTE PRODUCTO?"))
                { location.href='baja_producto.php';
                   return true;}
            else
            	return false;
                

      }
function confirmarCategoria()
      {
            if( confirm("¿ESTA SEGURO QUE DESEA BORRAR ESTA CATEGORIA?"))
                { location.href='baja_categoria.php';
                   return true;}
            else
            	return false;
                

      }