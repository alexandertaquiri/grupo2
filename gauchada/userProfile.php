<!DOCTYPE html>
<html class="">
    <head>
        <title>Gauchada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap & Bootstrap Validator CSS-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrapValidator.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
        
        <link href="css/userProfile.css" rel="stylesheet">
    </head>

    <body class="bg">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Inicio <span class="glyphicon glyphicon-home"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#contact"> <span class="glyphicon glyphicon-comment"><span class="badge badge-notify"></span></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-gift"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Ganar puntos</a></li>
                                <li><a href="#">Extras</a></li> 
                            </ul>
                        </li>
                        <li><a href="salir.php">Salir <span class="glyphicon glyphicon-log-out"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container left-space top-space">    
            <div class="row">
                <div class="vertical col-md-3">
                    <nav class="navbar navbar-inverse text-center">
                        <div class="col-md-12">
                            <div class="thmb text-center">
                                <img id="pic" src="" class="img-responsive img-circle" alt="Avatar">
                                <p class="glory">User</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav navbar-nav">
                                <li class="col-md-12"><a href="#"><span class="glyphicon glyphicon-pencil"></span> Editar perfil</a></li>
                                <li class="col-md-12"><a href="mis_publicaciones.php"><span class="glyphicon glyphicon-tasks"></span> Mis publicaciones</a></li>
                                <li class="col-md-12"><a><span class="glyphicon glyphicon-star"></span> Puntos <span id="pts" class="badge"></span></a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="well well-lg"></div>
                    <div class="well well-lg"></div>
                    <div class="well well-lg"></div>
                    <div class="well well-lg"></div>
                    <div class="well well-lg"></div>
                </div>
                <div class="row col-md-6">
                    <div class="panel panel-default ">
                        <div class="panel-body">
                            <div class="panel-heading">DATOS PERSONALES</div>
                            <br>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Nombre</label>
                                        <input id="name" type="text" name="name" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="lastname">Apellido</label>
                                        <input id="lastname" type="text" name="lastname" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label for="age">Edad</label>
                                        <select class="form-control" id="age" name="age" readonly>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="user">Usuario</label>
                                        <input id="user" type="text" name="user" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group">
                                        <label class="control-label" for="dni">DNI</label>
                                        <input id="dni" type="text" name="dni" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Teléfono</label>
                                        <input id="phone" type="text" name="phone" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="address">Dirección</label>
                                        <input id="address" type="text" name="address" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-md-3">

                </div>
            </div>
        </div>

            <!-- JQuery & Bootstrap Validator JS-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrapValidator.min.js"></script>
        <script src="js/userProfile.js"></script>
    </body>
</html>