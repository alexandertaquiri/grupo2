<html>
    <body>

        <div id="menu">

            <form action="index.php" method="GET">
                
                Título:
                <input type="text" name="busca" value="<?php
                if(isset($_GET['busca'])){ echo $_GET['busca']; }?>" size="30" placeholder="animales, objetos, pedidos, etc.">
                 
                Categorías:
                <select name="categorias">
                    <option value="Todos">Todos</option>
                    <?php
                        include_once("conexion.php");
                        $link=conectar();
                        $query="SELECT * FROM categoria";
                        $result=mysqli_query($link,$query);
                        while($row=mysqli_fetch_array($result)){
                            if($row['idCategoria']==$_GET['categorias']){
                                echo"<option value='".$row['idCategoria']."'selected>".$row['nombre']."</option>";
                                //echo"<h4>".$row['nombre']."</h4>";
                            }
                            else
                                echo"<option value='".$row['idCategoria']."'>".$row['nombre']."</option>";
                        }
                         //mysqli_free_result($result);
                         //mysqli_close($link);
                    ?>  
                    
               </select>
                Ciudad:
                 <select  name="ciudad" autofocus="autofocus">                
                         <option value="Todos"
                             <?php if(isset($_GET['ciudad'])){
                                      if("Todos"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Todos</option>
                         <option value="Buenos Aires"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Buenos Aires"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Buenos Aires</option>
                         <option value="Catamarca"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Catamarca"==$_GET['ciudad']){echo "selected=selected"; }}?> >Catamarca</option>
                         <option value="Chaco"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Chaco"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Chaco</option>
                         <option value="Chubut"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Chubut"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Chubut</option>
                         <option value="Córdoba"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Córdoba"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Córdoba</option>
                         <option value="Corrientes"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Corrientes"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Corrientes</option>
                         <option value="Entre Ríos"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Entre Ríos"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Entre Ríos</option>
                         <option value="Formosa"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Formosa"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Formosa</option>
                         <option value="Jujuy"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Jujuy"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Jujuy</option>
                         <option value="La Pampa"
                             <?php if(isset($_GET['ciudad'])){
                                       if("La Pampa"==$_GET['ciudad']){echo "selected=selected"; }} ?> >La Pampa</option>
                         <option value="La Rioja"
                             <?php if(isset($_GET['ciudad'])){
                                       if("La Rioja"==$_GET['ciudad']){echo "selected=selected"; }} ?> >La Rioja</option>
                         <option value="Mendoza"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Mendoza"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Mendoza</option>
                         <option value="Misiones"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Misiones"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Misiones</option>
                         <option value="Neuquén"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Neuquén"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Neuquén</option>
                         <option value="Río Negro"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Río Negro"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Río Negro</option>
                         <option value="Salta"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Salta"==$_GET['ciudad']){echo "selected=selected"; }}?> >Salta</option>
                         <option value="San Juan"
                             <?php if(isset($_GET['ciudad'])){
                                       if("San Juan"==$_GET['ciudad']){echo "selected=selected"; }} ?> >San Juan</option>
                         <option value="San Luis"
                             <?php if(isset($_GET['ciudad'])){
                                       if("San Luis"==$_GET['ciudad']){echo "selected=selected"; }} ?> >San Luis</option>
                         <option value="Santa Cruz"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Santa Cruz"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Santa Cruz</option>
                         <option value="Santa Fe"
                             <?php if(isset($_GET['ciudad'])){
                                       if("San Fe"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Santa Fe</option>
                         <option value="Santiago del Estero"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Santiago"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Santiago del Estero</option>
                         <option value="Tierra del Fuego"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Tierra del Fuego"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Tierra del Fuego</option>
                         <option value="Tucumán" 
                             <?php if(isset($_GET['ciudad'])){
                                       if("Tucumán"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Tucumán</option>
                 </select>
                <input type="submit" value="Buscar">
            </form>
           
        </div>
        <?Php  
                if(isset($_GET['busca'])){ if($_GET['busca']){echo"<h4>".'"'.$_GET['busca'].'"'."</h4>"; }}
                if(isset($_GET['ciudad'])){if("Todos"<>$_GET['ciudad']){echo"<h4>".'"'.$_GET['ciudad'].'"'."</h4>"; }}
                //if(isset($_GET['categorias'])){if("Todos"<>$_GET['categorias']){echo"<h4>".'"'.$_GET['categorias'].'"'."</h4>"; }}
                if(isset($_GET['categorias'])){if("Todos"<>$_GET['categorias']){
                  $idc=$_GET['categorias'];                
                  $result2=mysqli_query($link,"SELECT nombre FROM categoria WHERE idCategoria=$idc");
                   
                   
               $row2=mysqli_fetch_array($result2);
                  echo"<h4>".'"'.$row2['nombre'].'"'."</h4>"; }}
        ?>
    </body>
</html>