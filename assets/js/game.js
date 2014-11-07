(function(){
	var app = angular.module('game', ['ui.router']);

	var MAIN_PATH = 'http://localhost/thegame/';

	app.controller('GameBorder', function(){

	});

	app.controller('FightController', ['$http', '$scope', function($http, $scope, transformRequestAsFormPost ){

		$scope.load_mob = function(mobId){
			$scope.mob = [];
                $scope.newData = {};
			$http.post(MAIN_PATH + 'fights/rest/start.php', { param: 2 }).success(function(data){
				$scope.mobData = data;
			}).success(function(data){
                alert(pJSON(data));
            });

                console.log($scope.newData);
		}

		$scope.load_mob(2);

	}]);	

    var pJSON = function(string){
        return JSON.parse(string.substring(1,string.length-1));
    }

})();

