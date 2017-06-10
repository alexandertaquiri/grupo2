 <html>
<?php

Include("cabecera.php");


?>

<head>
   
    <title>  Tienda Online </title>
</head>
<body>

<div id="container">
  

<div id="productos">
<?php
include_once("conexion.php");
$link = conectar();

include("funciones.php");
$lastpage=0;
$filtrar=filtrarPor_usuario();
$orden=ordenamiento();


$filtrarPorUsuario=" AND p.idUsuario='$_SESSION[id]'";

$pagina=paginacion($lastpage,$filtrar,$orden,$filtrarPorUsuario);
// CONSULTA------------------
$query="SELECT c.nombre AS nomb, p.nombre, p.idProducto, p.precio,p.publicacion,p.caducidad,
        p.idCategoriaProducto, c.idCategoriaProducto,p.idUsuario 
        FROM productos p INNER JOIN categorias_productos c 
        ON p.idCategoriaProducto = c.idCategoriaProducto ".$filtrar." ".$filtrarPorUsuario." ".$orden." ".$pagina;

$result = mysqli_query($link,$query); 
//consulta 
//numeros de filas recuperadas
$num=mysqli_num_rows($result); 
 if ($num == 0) {
  echo"<h4>NO SE ENCONTRARON RESULTADO</h4>";
 }
else{  ?>

<table>
    <tr>
<?php    
    $cat=0; $url="";
    if(isset($_GET['categorias'])){
      
      $cat=$_GET['categorias'];
      }
      if(isset($_GET['busca'])){
           $cat=$cat."&busca=".$_GET['busca'];
    }?>
       <th abbr="Imagen del producto" scope="col">Imagen</th>
       <th abbr="Datos del producto" scope="col">
        <!--coloquiooooooooooooooo-->
       <?php echo "<a href=backend.php?ordenar=nombreDes&categorias=".$cat."><img src=imgs/abajo1.png /></a>" ?>
       <?php echo "<a href=backend.php?ordenar=nombreAsc&categorias=".$cat."><img src=imgs/arriba1.png /></a> Datos</th>"?>
       <th abbr="Categoria del producto" scope="col">Categoria</th>
       <th abbr="fecha del producto" scope="col" >
       <?php echo"<a href=backend.php?ordenar=fechaDes&categorias=".$cat."><img src=imgs/abajo1.png /></a>"?>
       <?php echo"<a href=backend.php?ordenar=fechaAsc&categorias=".$cat."><img src=imgs/arriba1.png /></a>Publicacion</th>"?>
      <th abbr="Vencimiento del producto" scope="col">Vencimiento</th>
      <th abbr="precio del producto" scope="col" >
       <?php echo"<a href=backend.php?ordenar=precioDes&categorias=".$cat."><img src=imgs/abajo1.png /></a>"?>
       <?php echo"<a href=backend.php?ordenar=precioAsc&categorias=".$cat."><img src=imgs/arriba1.png /></a>Precio</th>";?>

       <th abrr="modificar" scope="col">.. </th>
       <th abrr="eliminar" scope="col">.. </th> 
</tr>
<?php

for ($x = 1;$x <=$num ; $x++) { //obtengo el numero de filas del resultado
      $row = mysqli_fetch_array($result); // recupera ua fila del resultado como un arreglo
      echo"<tr><td width=300><img src=mostrarImagen.php?idProducto=".$row['idProducto']. "></td>"; 
                         
      echo"<td width=250><h4><a href=detalles.php?fila=".$row['idProducto'] .">" . $row['nombre'] ."</a><h4></td>";
      echo"<td width=150>". $row['nomb']." </td>"; // como obtengo la categoria 
      echo"<td width=175>". $row['publicacion']." </td>"; 
      echo"<td width=150>". $row['caducidad']." </td>";
      echo"<td width=150><strong>$ ". $row['precio']."</strong></td>";
      echo"<td id=boton width=100><a href=modificar_producto.php?fila=".$row['idProducto'].">MODIFICAR</a></td>";
      echo"<td id=boton width=100><a onclick='return confirmarProducto()' ; href=baja_producto.php?producto=".$row['idProducto'].">ELIMINAR</a></td></tr>";
      } 
 
mysqli_free_result($result);

mysqli_close($link);
}
?>
</table>
</div>
<?php
 include("footerBackend.php");
?>
</div>	
</body>
</html>	