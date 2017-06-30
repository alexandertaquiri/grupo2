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
            <div class="modal fade" id="modalPoints" data-backdrop="static" data-keyboard="false" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="glory"><span class="glyphicon glyphicon-fire"></span> Comprar Puntos</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form id="buyPoints" method="POST" enctype="multipart/form-data">
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="space-down"><label><span class="glyphicon glyphicon-credit-card"></span> Tipo de Tarjeta *</label></div>
                                                    <label class="radio-inline col-md-2"><input type="radio" name="card"><img class="img-responsive" src="imgs/mastercard.jpg" alt="Chania"></label>
                                                    <label class="radio-inline col-md-2"><input type="radio" name="card"><img class="img-responsive" src="imgs/visa.jpg" alt="Chania"></label>
                                                    <label class="radio-inline col-md-2"><input type="radio" name="card"><img class="img-responsive" src="imgs/ae.png" alt="Chania"></label>
                                                    <label class="radio-inline col-md-2"><input type="radio" name="card" checked><img class="img-responsive" src="imgs/card.png" alt="Chania"></label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="nCard"><span class="glyphicon glyphicon-sort-by-order"></span> Número de Tarjeta *</label>
                                                            <input id="nCard" type="tel" name="nCard" class="form-control" placeholder="Número de tarjeta *" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="code"><span class="glyphicon glyphicon-lock"></span> Código *</label>
                                                        <input id="code" name="code" type="text" class="form-control" placeholder="Código *" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="expiration"><span class="glyphicon glyphicon-calendar"></span> Caducidad: *</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="month">Mes:</label>
                                                            <select class="form-control" id="month" name="month">
                                                                <option value="1">Enero</option>
                                                                <option value="2">Febrero</option>
                                                                <option value="3">Marzo</option>
                                                                <option value="4">Abril</option>
                                                                <option value="5">Mayo</option>
                                                                <option value="6">Junio</option>
                                                                <option value="7">Julio</option>
                                                                <option value="8">Agosto</option>
                                                                <option value="9">Septiembre</option>
                                                                <option value="10">Octubre</option>
                                                                <option value="11">Noviembre</option>
                                                                <option value="12">Diciembre</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="year">Año:</label>
                                                        <select class="form-control" id="year" name="year">
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="points"><span class="glyphicon glyphicon-check"></span> Créditos *</label>
                                                        <input id="points" name="points" type="number" class="form-control" min="1" placeholder="Puntos *" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="price"><span class="glyphicon glyphicon-usd"></span> Costo</label>
                                                        <input id="price" name="price" type="text" class="form-control" placeholder="$" readonly>
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
                                                    <button type="submit" class="btn btn-success btn-send btn-block" form="buyPoints" value="Submit"><span class="glyphicon glyphicon-ok"></span> Confirmar</button>
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
        <script src="js/buyPointsForm.js"></script>
    </body>
</html>