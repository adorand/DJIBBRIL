var app=angular.module('BackEnd',[ 'ngRoute' , 'ngSanitize' , 'ngLoadScript']);

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

    $scope.tester=function (event) {
        var menu=$(this).find('.menu');
        var str=$(this).attr('class');
        console.log($(this));
        str=str.indexOf( /typecmd.*/i )[0];
        var apply=(str.indexOf('ann')!=-1) ? 'ctg' : (str.indexOf('val')!=-1) ? 'ssctg' : 'plats' ;

        menu.find('.menu-open').remove();
        menu.find('a.menu-item').remove();
        menu.prepend('<input type="checkbox" href="#" class="menu-open .menu-item-'+apply+'" name="menu-open" id="menu-open"/>');
        var edit=$('<a/>').addClass('menu-item');
        var icon_edit=$('<i/>').addClass('fa fa-edit');
        edit.append(icon_edit);
        var details=$('<a/>').addClass('menu-item');
        var icon_details=$('<i/>').addClass('fa fa-eye');
        details.append(icon_details);
        var remove=$('<a/>').addClass('menu-item');
        var icon_remove=$('<i/>').addClass('fa fa-trash-o');
        remove.append(icon_remove);
        menu.append(edit);menu.append(details);menu.append(remove);
        menu.find('.menu-item').addClass('menu-item-'+apply);
        /*<a href="#" class=""> <i class="fa fa-ey"></i> </a>
        <a href="#" class="menu-item"> <i class=""></i> </a>
        <a href="#" class="menu-item"> <i class="fa fa-trash-o"></i> </a>
        <div style="float: left;color:#FFF;margin-left:100px;display: none; ">actif</div>*/
        menu.append('<input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>');
    };

});


