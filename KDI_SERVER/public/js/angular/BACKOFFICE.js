var app=angular.module('BackEnd',[ 'ngRoute' , 'ngSanitize' ]);

app.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "accueil.blade.php",
        })
        .when("/produit", {
            templateUrl : "produit.blade.php",
        })
        .when("/surface", {
            templateUrl : "surface.blade.php",
        })
        .when("/membre", {
            templateUrl : "membre.blade.php",
        })
        .when("/utilisateur", {
            templateUrl : "utilisateur.blade.php",
        });
});

app.controller('BackEndCtl',function ($location,$scope,$q,$route)
{
    $scope.linknav="/";

    $scope.$on('$routeChangeStart', function(next, current)
    {
        $scope.linknav=$location.path();
        if(angular.lowercase(current.templateUrl).indexOf('produit')!=-1)
        {
        }
    });

    $scope.datatoggle=function (href,addclass) {
        $(href).attr('class').match(addclass) ? $(href).removeClass(addclass) : $(href).addClass(addclass);
    };


});


