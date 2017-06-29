<html>
    <body>
        <div id="menu">
            <form action="index.php" method="GET">
                
                titulo:
                <input type="text" name="busca" value="<?php
                if(isset($_GET['busca'])){ echo $_GET['busca']; }?>" size="30" placeholder="animales, objetos, pedidos, etc.">

                categorias:
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
                            }
                            else
                                echo"<option value='".$row['idCategoria']."'>".$row['nombre']."</option>";
                        }
                         mysqli_free_result($result);
                         mysqli_close($link);
                    ?>  
                    
                </select>
                ciudad:
                 <select  name="ciudad">                
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
                         <option value="Entre Rios"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Entre Rios"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Entre Rios</option>
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
                         <option value="Rio Negro"
                             <?php if(isset($_GET['ciudad'])){
                                       if("Rio Negro"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Rio Negro</option>
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
                         <option value="Santa Fé"
                             <?php if(isset($_GET['ciudad'])){
                                       if("San Fé"==$_GET['ciudad']){echo "selected=selected"; }} ?> >Santa Fé</option>
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
    </body>
</html>