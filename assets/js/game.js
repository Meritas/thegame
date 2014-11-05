(function(){
	var app = angular.module('game', ['ui.router']);

	var MAIN_PATH = 'localhost/thegame/';

	app.config(['$stateProvider', function($stateProvider){
		var fight = {
			name: '2',
			url: 'fight',
			templateUrl: MAIN_PATH + 'fights/2',
		}
	}])

	app.controller('GameBorder', function(){

	});

	app.controller('FightController', function($stateParams){

		/*this.fightUrls = [
			''
		];*/
	});

})();