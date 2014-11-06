<p>End</p>
<div ng-controller="MyPanel as panel" >
<div ng-controller='MyController as control' ng-hide='control.valuable.canPurchaseVip' ng-class="{activeClass: panel.isSelected(2)}">
<div ng-repeat="valuable in control.valuable | limitTo:2 | orderBy:'name'" >
	<h1 ng-click="panel.selectTab(1)">{{valuable.name | uppercase | limitTo:3}}</h1>
	<h2 ng-click="panel.selectTab(2)">{{valuable.price | currency}}</h2>
	<p ng-click="panel.selectTab(3)">{{valuable.descr}}</p>
	<p>{{panel.tab}}</p>
	<img ng-src="{{valuable.images[0].full}}" />
	<h4> Reviews </h4>
	<form name="reviewForm" ng-controller="ReviewController as reviewCtrl" ng-submit="reviewForm.$valid && reviewCtrl.addReview(valuable)" novalidate>
		<select ng-model="reviewCtrl.view.stars" required>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>
		<textarea ng-model="reviewCtrl.review.body" required></textarea>
		<label ng-model="reviewCtrl.review.author">by:</label>
		<input type="email" required />
		<input type="radio" value="red" ng-model="reviewCtrl.review.color" />Red
		<input type="radio" value="red" ng-model="reviewCtrl.review.color" />Blue
		<input type="radio" value="red" ng-model="reviewCtrl.review.color" />Green
		<input type="checkbox" ng-model="reviewCtrol.review.terms" />I agree to these terms

		<div>review form is {{reviewForm.$valid}}</div>
		<input type="submit" value="submit" />
	</form>


	<blockquote ng-repeat="review in valuable.reviews">
		<b>Stars: {{review.stars}}</b>
		{{review.body}}
		<cite>{{review.author}}</cite>
	</blockquote>
	<button ng-show='valuable.canPurchase'>Buy</button>
	</div>
</div>
</div>
<p>{{sdfsd}}</p>