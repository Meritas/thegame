(function(){
	var app = angular.module('game', ['ngResource', 'ngRoute', 'ui.router']);

	var MAIN_PATH = 'http://localhost/thegame/';

    app.config(['$routeProvider', function ($routeProvider) {
        $routeProvider.
            when('/test/:id',{
                templateUrl: function($stateParams){
                    return 'fights/actions/start/:id';// + $stateParams.id;
                }, 
                controller: 'FightController'
            }).
            otherwise({
                templateUrl: 'story/actions/enemies'
            })
    }]);

	app.controller('GameBorder', function(){

	});

	app.controller('FightController', ['$http', '$scope', function($http, $scope){

		$scope.load_mob = function(mobId){
			$scope.mobData =  {};
			$http.post(MAIN_PATH + 'fights/rest/start.php', { mobId: mobId }
				).success(function(data){
					$scope.mobData = pJSON(data).mobData;
					console.log($scope.mobData.name);
				});
		}

		$scope.load_mob(2);

	}]);	

    var pJSON = function(string){
        return JSON.parse(string.substring(1,string.length-1));
    }

})();

