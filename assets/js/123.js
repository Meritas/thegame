app.directive('productTitle', function(){
	return{
		//A configuration object defining how your directive will work
		restrict: 'E',
		templateUrl: 'product-title.html'
	};
});



/*app.directive('productTitle', function(){
	return{
		restrict: 'A',
		templateUrl = 'product-title.html'
	};
});*/



app.directive('productPanels', function(){
	return{
		restrict: "E",
		templateUrl: "product-panels.html",
		controller: function(){
			<!-- ... -->
		},
		controllerAs: 'panels',
	}
})


<!-------------------------------------------------- -->


app.controller('SomeController', ['$http', function($http){ //$ - services

}]); //Dependency injection!


app.controller('SomeController', ['$http', '$log', function($http, $log){

}]);



(function(){

	var app = angular.module('store', [ 'store-products' ]);

	app.controller('StoreController', ['$http', function($http){

		var store = this;

		store.products = [ ];// <<- let's intialize the array so we don't get an error since the page will render before our data returns from the get request

		$http.get('/products.json').success(function(data){ //data is returned
			store.products = data;
		});

		$http.post('/path/to/our/json/file.json', { param: 'value' });

		$http.delete('path/to/our/json/file/json');

		//or any other HTTP method by using a Config object

		$http({ method: 'OPTIONS', url: '/path/to/our/json/file.json' });
		$http({ method: 'PATCH', url: '/path/to/our/json/resource.json' });
		$http({ method: 'TRACE', url: '/path/to/our/json/resource.json' });

	});
});