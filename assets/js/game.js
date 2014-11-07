(function(){
	var app = angular.module('game', ['ui.router']);

	var MAIN_PATH = 'http://localhost/thegame/';

	/*app.config(['$httpProvider', function($httpProvider, RestangularProvider) {
	    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
	    $httpProvider.defaults.transformRequest = [function(data) {
	        if (_.isObject(data)) {
	            return jQuery.param(data);
	        } else {
	            return data;
	        }
	    }];

	    RestangularProvider.setListTypeIsArray(false);
	    RestangularProvider.setResponseExtractor(function(response, op, what, url) {
	        return response.data;
	    });
	});*/




	app.controller('GameBorder', function(){

	});

	app.controller('FightController', ['$http', '$scope', function($http, $scope, transformRequestAsFormPost ){

		$scope.get_page = function(){
			$http({
					method: 'GET',
					url: 'http://localhost/thegame/fights/fetch'
			}).success(function(data){
				$scope.result = data;
			});
		};

		$scope.load_mob = function(mobId){
			$scope.mob = [];
			$http.post(MAIN_PATH + 'fights/getmob.php', { param: 2 }).success(function(data){
				$scope.mob = data;
			});

			var request = $http({
                    method: "post",
                    url: MAIN_PATH + 'fights/getmob.php',
                    transformRequest: transformRequestAsFormPost,
                    data: {
                        id: 4,
                        name: "Kim",
                        status: "Best Friend"
                    }
            });

		}

		$scope.load_mob(2);

		//$scope.get_page();

	}]);

	 app.factory(
            "transformRequestAsFormPost",
            function() {
 
                // I prepare the request data for the form post.
                function transformRequest( data, getHeaders ) {
 
                    var headers = getHeaders();
 
                    headers[ "Content-type" ] = "application/x-www-form-urlencoded; charset=utf-8";
 
                    return( serializeData( data ) );
 
                }
 
 
                // Return the factory value.
                return( transformRequest );
 
 
                // ---
                // PRVIATE METHODS.
                // ---
 
 
                // I serialize the given Object into a key-value pair string. This
                // method expects an object and will default to the toString() method.
                // --
                // NOTE: This is an atered version of the jQuery.param() method which
                // will serialize a data collection for Form posting.
                // --
                // https://github.com/jquery/jquery/blob/master/src/serialize.js#L45
                function serializeData( data ) {
 
                    // If this is not an object, defer to native stringification.
                    if ( ! angular.isObject( data ) ) {
 
                        return( ( data == null ) ? "" : data.toString() );
 
                    }
 
                    var buffer = [];
 
                    // Serialize each key in the object.
                    for ( var name in data ) {
 
                        if ( ! data.hasOwnProperty( name ) ) {
 
                            continue;
 
                        }
 
                        var value = data[ name ];
 
                        buffer.push(
                            encodeURIComponent( name ) +
                            "=" +
                            encodeURIComponent( ( value == null ) ? "" : value )
                        );
 
                    }
 
                    // Serialize the buffer and clean it up for transportation.
                    var source = buffer
                        .join( "&" )
                        .replace( /%20/g, "+" )
                    ;
 
                    return( source );
 
                }
 
            }
        );

})();