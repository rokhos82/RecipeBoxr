var recipeboxr = {};

recipeboxr.appStates = {
	main: "main",
    cupboards: "cupboards",
    fridge: "fridge",
    freezer: "freezer",
    pantry: "pantry"
};

recipeboxr.data = {
    cupboards: {
        food: [
            {name: "Rotel",quantity: 10},
            {name: "Siracha",quantity: 1},
            {name: "Green Beans",quantity: 20}
        ]
    },
    fridge: {},
    freezer: {},
    pantry: {}
};

recipeboxr.app = new angular.module("recipeboxr",[]);
recipeboxr.ctl = new recipeboxr.app.controller("rbrCtl",["$scope",function($scope){
	$scope.greeting = "Hello and welcome to RecipeBoxR!";
    
    $scope.rbr = recipeboxr;
    $scope.state = recipeboxr.appStates.main;
    
    $scope.cupboardStateChange = function() {
        $scope.state = $scope.rbr.appStates.cupboards;
        $scope.food = $scope.rbr.data.cupboards.food;
    };
}]);