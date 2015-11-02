var recipeboxr = {};

recipeboxr.appStates = {
	main: "main",
    pantry: "pantry",
    products: "products",
    freezer: "freezer",
};

recipeboxr.data = {
    pantry: {
        cupboard: [
            {name: "Rotel",quantity: 10},
            {name: "Siracha",quantity: 1},
            {name: "Green Beans",quantity: 20}
        ]
    },
    products: {},
    freezer: {},
    pantry: {}
};

recipeboxr.app = new angular.module("recipeboxr",[]);

recipeboxr.controllers = {};
recipeboxr.controllers.main = new recipeboxr.app.controller("rbrCtl",["$scope",function($scope){
	$scope.greeting = "Hello and welcome to RecipeBoxR!";
    
    $scope.rbr = recipeboxr;
    $scope.state = recipeboxr.appStates.main;
}]);

recipeboxr.directives = {};
recipeboxr.directives.pantryManager = recipeboxr.app.directive("pantryManager",function(){
	return {
		restrict: 'E',
		templateUrl: 'templates/pantry-manager.html'
	};
});