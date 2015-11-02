<!DOCTYPE html>
<html ng-app="recipeboxr" lang="en">
	<head>
		<title>RecipeBoxR</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css\starter-template.css" />
		<link rel="stylesheet" type="text/css" href="css\rbr.ang.css" />
	</head>
	<body ng-controller="rbrCtl as ctl">
	 	<div class="fuild-container" ng-controller="rbrCtl as ctl">
		    <div class="row">
		        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
		            <ul class="nav nav-pills nav-stacked">
		                <li ng-class="{active:state === rbr.appStates.main}" ng-click="state = rbr.appStates.main"><a href="#">Main</a></li>
		                <li ng-class="{active:state === rbr.appStates.pantry}" ng-click="cupboardStateChange()"><a href="#">Pantry</a></li>
		                <li ng-class="{active:state === rbr.appStates.products}" ng-click="state = rbr.appStates.products"><a href="#">Products</a></li>
		                <li ng-class="{active:state === rbr.appStates.freezer}" ng-click="state = rbr.appStates.freezer"><a href="#">Freezer</a></li>
		            </ul>
		        </div>
		        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" ng-show="state === rbr.appStates.main">
		            <h4>{{greeting}}</h4>
		            <p>This is a SPA using AngularJS and Bootstrap to track the food you have in your house</p>
		        </div>
		        <pantry-manager></pantry-manager>
		        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" ng-show="state === rbr.appStates.products">
		            <h4>Products Manager</h4>
		        </div>
		        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" ng-show="state === rbr.appStates.freezer">
		            <h4>Freezer Manager</h4>
		        </div>
		        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" ng-show="state === rbr.appStates.pantry">
		            <h4>Pantry Manager</h4>
		        </div>
		    </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/rbr.ang.js"></script>
	</body>
</html>