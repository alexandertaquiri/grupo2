<!DOCTYPE html>
<html>
    <head>
        <title>Gauchada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap & Bootstrap Validator CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrapValidator.min.css" rel="stylesheet">
        
        <link href="css/userProfile.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-fixed-top orange">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand white" href="index.php"><img src="imgs/fav32.png" class="img-responsive"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li><a class="white" href="#contact"> <span class="glyphicon glyphicon-comment"><span class="badge badge-notify"></span></a></li>
                         <li class="dropdown">
                            <a class="dropdown-toggle white" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-gift"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ganar puntos</a></li>
                                <li><a href="#">Extras</a></li> 
                            </ul>
                        </li> -->
                        <li><a class="white" href="salir.php">CERRAR SESIÓN <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid cnt-bnr">
            <div class="row banner"></div>
        </div>
            
        <div class="container margin-cont">    
            <div class="row">
                <div class="vertical col-md-3">
                    <nav class="navbar text-center nv-vrt orange">
                        <div class="col-md-12">
                            <p id="usr" class="user"></p>
                            <div class="thmb">
                                <img id="pic" src="" class="img-responsive" alt="Avatar">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav navbar-nav vert-list">
                                <li class="col-md-12 edit"><a class="vrt-nv-elm"><span class="glyphicon glyphicon-pencil icons"></span> Editar perfil</a></li>
                                <li class="col-md-12"><a class="vrt-nv-elm" id="chgpwd" data-toggle="modal" data-target="#passModal"><span class="glyphicon glyphicon-lock icons"></span> Cambiar contraseña</a></li>
                                <li class="col-md-12"><a class="vrt-nv-elm" href="mis_publicaciones.php"><span class="glyphicon glyphicon-tasks icons"></span> Mis publicaciones</a></li>
                                <li class="col-md-12"><a class="vrt-nv-elm"><span class="glyphicon glyphicon-star icons"></span> Puntos <span id="pts" class="badge"></span></a></li>
                                <li class="col-md-12"><a class="vrt-nv-elm"><span class="glyphicon glyphicon-check icons"></span> Créditos <span id="cdts" class="badge"></span></a></li>
                                <li class="col-md-12 edit"><a href="eliminarCuenta.php" class="vrt-nv-elm"><span class="glyphicon glyphicon-remove icons"></span> Eliminar cuenta</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="row col-md-6 center-block">
                    <div class="panel panel-default ">
                        <div class="panel-body">
                            <div class="panel-heading orange">DATOS PERSONALES</div>
                            <form id="userProfile" method="POST" enctype="multipart/form-data">
                                <br>
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="name2">Nombre</label>
                                                    <input id="name2" type="text" name="name2" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="lastname2">Apellido</label>
                                                    <input id="lastname2" type="text" name="lastname2" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label for="age2">Edad</label>
                                                    <select class="form-control" id="age2" name="age2" readonly>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="user">Usuario</label>
                                                    <input id="user2" type="email" name="user2" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label" for="dni2">DNI</label>
                                                    <input id="dni2" type="text" name="dni2" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="phone2">Teléfono</label>
                                                    <input id="phone2" type="text" name="phone2" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="address2">Dirección</label>
                                                    <input id="address2" type="text" name="address2" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="row col-md-3">
   <!--                  <div class="panel panel-default ">
                        <div class="panel-body">
                            <div class="panel-heading orange">Mi reputación</div>
                            <div>
                                <h3></h3>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header orange center-block">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="glory"><span class="glyphicon glyphicon-link"></span> DATOS PERSONALES</h4>
                        </div>
                        <div class="modal-body bg-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="editProfile" method="POST" enctype="multipart/form-data">
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="name">Nombre</label>
                                                            <input id="name" type="text" name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="lastname">Apellido</label>
                                                            <input id="lastname" type="text" name="lastname" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="age">Edad</label>
                                                            <select class="form-control" id="age" name="age">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="user">Usuario</label>
                                                            <input id="user" type="email" name="user" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label" for="dni">DNI</label>
                                                            <input id="dni" type="text" name="dni" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" for="phone">Teléfono</label>
                                                            <input id="phone" type="text" name="phone" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div><label for="image">Imagen</label></div>
                                                            <input name="image" accept=".jpg,.jpeg,.png" type="file" class="hide-button" onchange="$(this).parent().find('small').html($(this).val().replace('C:\\fakepath\\', ''))">
                                                            <input class="btn btn-default" type="button" value="Examinar" onclick="$(this).parent().find('input[type=file]').click();"/>
                                                            <small id="fileHelp" class="form-text text-muted">Ingrese una imagen.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="address">Dirección</label>
                                                            <input id="address" type="text" name="address" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-muted"><strong>*</strong> Estos campos son obligatorios.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                  <div class="col-md-4 center-block" style="float: none;">
                                                      <button type="submit" class="btn btn-success btn-send btn-block" form="editProfile" value="Submit"><span class="glyphicon glyphicon-ok"></span> Publicar</button>
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

        <div class="container">
            <div class="modal fade" id="passModal" data-backdrop="static" data-keyboard="false" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header orange center-block">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="glory"><span class="glyphicon glyphicon-lock"></span> Contraseña</h4>
                        </div>
                        <div class="modal-body bg-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="chgpwd" method="POST" enctype="multipart/form-data">
                                        <div class="controls">
                                            <div class="row">
                                                
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label class="control-label" for="pwd">Nueva contraseña</label>
                                                            <input id="pwd" type="password" name="pwd" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label class="control-label" for="pwd2">Repita la contraseña</label>
                                                            <input id="pwd2" type="password" name="pwd2" class="form-control">
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            
                                            <div class="row">
                                                  <div class="col-md-4 center-block" style="float: none;">
                                                      <button id="btn-sub" type="submit" class="btn btn-success btn-send btn-block" form="chgpwd" value="Submit"><span class="glyphicon glyphicon-ok"></span> Publicar</button>
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
        <script src="js/userProfile.js"></script>
        <script src="js/changepwd.js"></script>
    </body>
</html>