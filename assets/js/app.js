(function(){
	var app = angular.module('store', [ ]);

	app.controller('MyController', function(){
		this.valuable = gem;
	});

	app.controller('MyPanel', function(){
		this.tab = 1;

		this.selectTab = function(setTab){
			this.tab = setTab;
		};

		this.isSelected = function(tabValue){
			return tabValue === this.tab;
		}

	});

	app.controller('ReviewController', function(){
		this.review = {};

		this.addReview = function(valuable){
			valuable.reviews.push(this.review);
			this.review = {};
		};
	});

	var gem = [
		{
			name: 'Jade',
			price: 4.95,
			descr: 'A green gemstorne',
			canPurchase: true,
			canPurchaseVip: false,
			images: [
				{
					full: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png',
					small: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png'
				},
			],
			reviews: [
				{
					stars: 5,
					body: "I love this product",
					author: 'joe@thomas.com'
				},
				{
					stars: 6,
					body: "I love this product too",
					author: 'boe@thomas.com'
				}
			],
		},
		{
			 name: 'Zircoon',
			 price: 9.9,
			 descr: 'A green gemstone',
			 canPurchase: true,
			 canPurchaseVip: false,
			 images: [
				{
					full: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png',
					small: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png'
				},
			],
			reviews: [
				{
					stars: 5,
					body: "I love this product",
					author: 'joe@thomas.com'
				},
				{
					stars: 6,
					body: "I love this product too",
					author: 'boe@thomas.com'
				}
			],
		},
		{
			name: 'Topaz',
			price: 2.3,
			descr: 'An orange gemstgone',
			canPurchase: true,
			images: [
				{
					full: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png',
					small: 'http://www.gravatar.com/avatar/e420241bec32f3d97b60f82e17550c2e?size=50&default=http%3A%2F%2Ffuelphp.com%2Fforums%2Fplugins%2FGravatar%2Fdefault.png'
				},
			],
			reviews: [
				{
					stars: 5,
					body: "I love this product",
					author: 'joe@thomas.com'
				},
				{
					stars: 6,
					body: "I love this product too",
					author: 'boe@thomas.com'
				}
			],
		},
	]
})();

/*function MyController($scope){
	alert('Yo yo gimme yo monneh yo');
	$scope.total = 4;
}*/