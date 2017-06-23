<?PHP
function filtrarPor(){
 
  $fecha=date("Y-m-d");
  $filtrar=" ";
  
  if (isset($_GET['ciudad'])&& (!empty($_GET['ciudad'])) &&($_GET['ciudad']!= "Todos")) {
   
    $filtrar=" AND publicacion.ciudad = '$_GET[ciudad]'  ";
  }
  

  
  $filtrar2=" ";
  if (isset($_GET['categorias'])&& (!empty($_GET['categorias'])) &&($_GET['categorias']!= "Todos")) {
   
    $filtrar2="AND publicacion.idCategoria = '$_GET[categorias]'";
  }
  
  $caducidad="WHERE publicacion.caducidad >='$fecha'";
  $buscar=busqueda();
  $filtrar=$caducidad."".$filtrar."".$filtrar2."".$buscar;
  return $filtrar;
 }

 function busqueda(){

  $buscar=" "; 
  if(isset($_GET['busca'])){ 
    $palabra=$_GET['busca'];
    if($palabra!=""){
      $buscar="AND publicacion.titulo LIKE '%$palabra%'";
      }
  }  
 
  return $buscar;
 }

 ?>