
angular.module('vehicleService', [])

    .factory('Vehicle', function($http) {

      return {
        // get all the vehicles
        query: function() {
          return $http.get('api/vehicles');
        },
        search: function(q){
          return $http.get('api/vehicles/find?q=' + q);
        },
        get: function(id){
          return $http.get('api/vehicles/' + id);
        },
        update: function(data){
          return $http.put('api/vehicles/' + data.id, data);
        },
        save: function(data){
          return $http.post('api/vehicles', data);
        }

      }

    });