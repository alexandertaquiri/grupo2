<?php
    include("connectDataBase.php");
    $conn = connect();
?>
<!DOCTYPE html>
<html class="background">
    <head>
        <title>Gauchada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap & Bootstrap Validator CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrapValidator.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">

    </head>
    <body>
        <div class="container">
            <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="glory"><span class="glyphicon glyphicon-link"></span> Gauchada</h4>
                        </div>
                        <div class="modal-body bg-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="gauchada" method="POST" action="submitPostGauchada.php" enctype="multipart/form-data">
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label" for="title"><span class="glyphicon glyphicon-thumbs-up"></span> Título *</label>
                                                            <input id="title" type="text" name="title" class="form-control" placeholder="Por favor, escriba el título de la gauchada *" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div><label for="image"><span class="glyphicon glyphicon-picture"></span> Imagen</label></div>
                                                        <input name="image" accept=".jpg,.jpeg,.png" type="file" class="hide-button" onchange="$(this).parent().find('small').html($(this).val().replace('C:\\fakepath\\', ''))"  />
                                                        <input class="btn btn-default" type="button" value="Examinar" onclick="$(this).parent().find('input[type=file]').click();"/>
                                                        <small id="fileHelp" class="form-text text-muted">Por favor, ingrese una imagen.</small>
                                                    </div>
                                               </div> 
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="city"><span class="glyphicon glyphicon-globe"></span> Ciudad *</label>
                                                        <div>
                                                            <select class="form-control" id="city" name="city">
                                                                <option value="Buenos Aires">Buenos Aires</option>
                                                                <option value="Catamarca">Catamarca</option>
                                                                <option value="Chaco">Chaco</option>
                                                                <option value="Chubut">Chubut</option>
                                                                <option value="Córdoba">Córdoba</option>
                                                                <option value="Corrientes">Corrientes</option>
                                                                <option value="Entre Rios">Entre Rios</option>
                                                                <option value="Formosa">Formosa</option>
                                                                <option value="Jujuy">Jujuy</option>
                                                                <option value="La Pampa">La Pampa</option>
                                                                <option value="La Rioja">La Rioja</option>
                                                                <option value="Mendoza">Mendoza</option>
                                                                <option value="Misiones">Misiones</option>
                                                                <option value="Neuquén">Neuquén</option>
                                                                <option value="Rio Negro">Rio Negro</option>
                                                                <option value="Salta">Salta</option>
                                                                <option value="San Juan">San Juan</option>
                                                                <option value="San Luis">San Luis</option>
                                                                <option value="Santa Cruz">Santa Cruz</option>
                                                                <option value="Santa Fé">Santa Fé</option>
                                                                <option value="Santiago del Estero">Santiago del Estero</option>
                                                                <option value="Tierra del Fuego">Tierra del Fuego</option>
                                                                <option value="Tucumán">Tucumán</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exp"><span class="glyphicon glyphicon-calendar"></span> Caducidad</label>
                                                        <input id="exp" name="exp" type="date" max="2018-12-30" class="form-control" placeholder="Por favor, ingrese la fecha de caducidad *" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cat"><span class="glyphicon glyphicon-tags"></span>  Categoría *</label>
                                                        <div>
                                                            <select class="form-control" id="cat" name="cat">
                                                            <?php
                                                                  $result=mysqli_query($conn,"SELECT * FROM categoria");
                                                                  while($row=mysqli_fetch_array($result)){
                                                                      echo"<option value=".$row['idCategoria'].">".$row['nombre']."</option>";      
                                                                } 
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message"><span class="glyphicon glyphicon-align-justify"></span> Descripción *</label>
                                                        <textarea id="message" name="message" class="form-control" placeholder="Por favor, cuéntenos acerca de la gauchada *" rows="4" required=""></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-muted"><strong>*</strong> Estos campos son obligatorios.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-md-offset-2">
                                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar </button>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2">
                                                    <button type="submit" class="btn btn-success btn-send btn-block" form="gauchada" value="Submit"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
                                                    <!-- <input type="submit" class="btn btn-success btn-send" value="Crear Gauchada"> -->
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JQuery & Bootstrap Validator JS-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script src="js/postGauchadaForm.js"></script>
    </body>
</html>