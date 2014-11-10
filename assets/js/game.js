(function(){
	var app = angular.module('game', ['ui.router']);

	var MAIN_PATH = 'http://localhost:3000/thegame/';

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

