angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Vehicle) {

      $http.defaults.headers.common['Authorization'] = 'Bearer m4Ut0k3NL3g4Ln40';

      Vehicle.query().success(function(data) {
        $scope.vehicles = data;
        if(data.length){
          $scope.detail = data[0];
          $(".details").removeClass('d-none');
        }
      });

      $scope.search = function(detail){
        $(".details").addClass('d-none');
        q = $scope.q ? $scope.q : '';
        Vehicle.search(q).success(function(data){
          $scope.vehicles = data;
          if(data.length){
            $scope.detail = detail ? detail : data[0];
            $(".details").removeClass('d-none');
          }
        });
      };

      $scope.show = function(vehicle){
        Vehicle.get(vehicle.id).success(function(data){
          $scope.detail = data;
        });
      };

      $scope.edit = function(vehicle) {
        Vehicle.get(vehicle.id).success(function (data) {
          $("#editVehicleModal").modal();
          $scope.vehicle = data;
        });
      };

      $scope.update = function(vehicle){
        Vehicle.update(vehicle).success(function(data){
          $("#editVehicleModal").modal('toggle');
          $scope.search(data);
        });
      };

      $scope.add = function(data){
        Vehicle.save(data).success(function(data){
          $("#addVehicleModal").modal('toggle');
          $scope.search(data);
        });
      };


    });