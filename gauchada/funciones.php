<?PHP
function filtrarPor(){
 
  $fecha=date("Y-m-d");
  $filtrar=" ";
  
  if (isset($_GET['ciudad'])&& (!empty($_GET['ciudad'])) &&($_GET['ciudad']!= "Todos")) {
   
    $filtrar=" WHERE publicacion.ciudad = '$_GET[ciudad]' AND publicacion.caducidad >='$fecha' ";
  }
  else{
      $filtrar= "WHERE publicacion.caducidad >='$fecha'" ;
  }

  $buscar=busqueda();
  $filtrar=$filtrar."".$buscar;
  return $filtrar;
 }

 function busqueda(){

  $buscar=" "; 
  if(isset($_GET['busca'])){ 
    $palabra=$_GET['busca'];
    if($palabra!=""){
      $buscar="AND publicacion.titulo LIKE '$palabra%'";
      }
  }  
  if(isset($_GET['busca2'])){
    $palabra=$_GET['busca2'];
    if($palabra!=""){
      $buscar="AND publicacion.titulo LIKE '%$palabra%'";
    }
  }  
  return $buscar;
 }

 ?>