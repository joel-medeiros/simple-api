<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simple AngularJS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body ng-app="vehicleApp" ng-controller="mainController">
<div class="container-fluid">
    <div class="row header">
        <div class="col col-md-6 col-sm-12 col-12 title">
            <h1 style="display: inline"><i class="fa fa-apple"></i></h1> &nbsp;
            <h3 style="display: inline">Joel Medeiros</h3>
        </div>
        <div class="col col-md-6 col-sm-12 col-12 search">
            <input type="text" name="q" class="form-control form-control-lg" ng-model="q" placeholder="Buscar por um veículo" ng-keyup="search()">
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 col-sm-12 col-12">
            <div class="card no-background-and-border">
                <div class="card-body">
                    <h4 class="card-title page-title">VEÍCULO
                        <a class="btn btn-secondary btn-add float-right" data-toggle="modal" data-target="#addVehicleModal">
                            <i class="fa fa-plus"></i>
                        </a>
                    </h4>
                    <div class="row">
                        <div class="col col-md-6 col-sm-12 col-12">
                            <span class="content-title">Lista de Veículos</span>
                            <div class="row-fluid">
                                <ul class="list-group">
                                    <li class="list-group-item" ng-repeat="vehicle in vehicles | filter:{name:q}" ng-click="show({id:vehicle.id})" ng-model="id">
                                        <span class="brand">@{{ vehicle.brand }}</span>
                                        <span class="vehicle"> @{{ vehicle.name }}
                                            <i class="fa fa-tag @{{ vehicle.sold ? 'sold' : '' }} float-right" style="font-size:30px"></i>
                        </span>
                                        <span class="year">@{{ vehicle.year}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-md-6 col-sm-12 col-12">
                            <span class="content-title">Detalhes</span>
                            <div class="card details">
                                <div class="card-body">
                                    <h4 class="card-title vehicle-title">@{{ detail.name }}</h4>
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-12 col-12">
                                            <label>Marca
                                                <input type="text" name="brand" class="form-control" readonly="readonly" value="@{{ detail.brand }}">
                                            </label>
                                        </div>
                                        <div class="col col-md-6 col-sm-12 col-12">
                                            <label>Ano
                                                <input type="text" name="year" class="form-control" readonly="readonly" value="@{{ detail.year }}">
                                            </label>
                                        </div>
                                    </div>
                                    <p class="card-text description">@{{ detail.description }}</p>
                                    <hr/>
                                    <button type="button" class="btn btn-secondary" ng-click="edit({id:detail.id})">
                                        <i class="fa fa-pencil"></i>
                                        EDITAR
                                    </button>
                                    <i class="fa fa-tag @{{ detail.sold ? 'sold' : '' }} float-right" style="font-size:50px"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editVehicleModal" tabindex="-1" role="dialog" aria-labelledby="editVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVehicleModalLabel">Editando @{{ vehicle.name }}</h5>
                <a class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form ng-submit="update(vehicle)" ng-controller="mainController">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="vehicle.name" class="form-control" placeholder="Veículo" value="@{{ vehicle.name }}">
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="vehicle.brand" class="form-control" placeholder="Marca" value="@{{ vehicle.brand }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="vehicle.year" class="form-control" placeholder="Ano" value="@{{ vehicle.year }}">
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" ng-model="vehicle.sold" class="form-check-input" value="1" ng-checked="vehicle.sold" ng-true-value="1" ng-false-value="0"> Vendido
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea type="text" ng-model="vehicle.description" class="form-control" placeholder="Descrição" rows="10">@{{ vehicle.description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">SAVE</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVehicleModalLabel">Novo Veículo</h5>
                <a class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form ng-submit="add(data)" ng-controller="mainController">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="data.name" class="form-control" placeholder="Veículo">
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="data.brand" class="form-control" placeholder="Marca">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <input type="text" ng-model="data.year" class="form-control" placeholder="Ano">
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" ng-model="data.sold" class="form-check-input" value="1" ng-true-value="1" ng-false-value="0"> Vendido
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea type="text" ng-model="data.description" class="form-control" placeholder="Descrição" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">SAVE</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="js/app/controllers/main.js"></script>
<script src="js/app/services/vehicleService.js"></script>
<script src="js/app/app.js"></script>
</body>
</html>
