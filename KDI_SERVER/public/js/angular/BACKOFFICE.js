var app=angular.module('BackEnd',[ 'ngRoute' , 'ngSanitize' , 'ngLoadScript' ]);

app.factory('Init',function ($http, $q)
{
    var factory=
    {
        data:false,
        getElement:function (element,listeattributs)
        {

            var deferred=$q.defer();
            $http({
                method: 'GET',
                url: '/graphql?query= {'+element+' {'+listeattributs+'} }'
            }).then(function successCallback(response) {
                factory.data=response['data']['data'][element];
                deferred.resolve(factory.data);
            }, function errorCallback(response) {
                deferred.reject("Impossible de récupérer les "+element+" depuis le serveur distant");
            });
            return deferred.promise;
        }


    };
    return factory;
});

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

app.controller('BackEndCtl',function (Init,$location,$scope,$q,$route)
{
    var listofrequests =
    [
        {"categories": "code, nom, description, souscategories { code,nom, parent { code nom }, produits { code, designation, description, quantite, prix image, categorie { code,nom } } }"}
    ];



    $scope.linknav="/";

    $scope.$on('$routeChangeStart', function(next, current)
    {
        $scope.linknav=$location.path();
        if(angular.lowercase(current.templateUrl).indexOf('produit')!=-1)
        {
            $.each(listofrequests[0],function (element, listeattributs)
            {
                Init.getElement(element, listeattributs).then(function (data)
                {
                    $scope.categories=data;

                    console.log(JSON.stringify($scope.categories));

                }, function (msg)
                {
                    toastr.error(msg);
                });
            });
        }
    });

    $scope.datatoggle=function (href,addclass) {
        $(href).attr('class').match(addclass) ? $(href).removeClass(addclass) : $(href).addClass(addclass);
    };


    function emptyform(type)
    {
        var dfd = $.Deferred();
        (type.indexOf('produit')!=-1) ?
        (
            $("#id_produit").val(""),
            $("#nomproduit").val(""),
            $('.input-modal').val("")
        )
        : '' ;
        return dfd.promise();
    }


    $scope.showModalAdd=function (type)
    {
        $("#modal_add"+type).modal('show');
    };


    // Add element in database and in scope
    $scope.addElement=function(e,type)
    {
        var continuer=true;
        e.preventDefault();

        var form=$('#form_add'+type);
        var formdata=(window.FormData) ? ( new FormData(form[0])): null;
        var data=(formdata!==null) ? formdata : form.serialize();

        (continuer) ?
            $.ajax
            (
                {
                    url:'/'+type,
                    type:'POST',
                    contentType:false,
                    processData:false,
                    DataType:'json',
                    data:data,
                    success:function(obj)
                    {
                        obj=JSON.parse(obj);
                        (type.inde('Slider'))
                        {
                            ($("#save_"+type).html().match('edit')) ?
                            (
                                $.each($scope.sliders,function (key,value)
                                {
                                    if(value.id==obj.id)
                                    {
                                        // setTimeout(function () { }, 100000);
                                        // $('.slider_'+value.id+' img').attr('src',obj.image);
                                        $scope.sliders[key]=obj;
                                    }
                                })
                            )
                            :(
                                $scope.sliders.push(obj)
                            );
                        }
                        toastr.success('SUCCÈS!', angular.uppercase(type) , { extendedTimeOut: 100000, TimeOut: 5000000});
                        emptyform(type);
                        $("#modal_add"+type).modal('hide');

                    },
                    error:function (error)
                    {
                        toastr.error(error['responseText']);
                        toastr.error("Si vous ne comprenez pas l'erreur, contactez l'administrateur");
                    }
                }
            ):' ';

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



/*POUR LES UPLOADS*/
function isValide(fichier)
{
    var Allowedextensionsimg=new Array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG");
    var Allowedextensionsvideo=new Array("mp4");
    for (var i = 0; i < Allowedextensionsimg.length; i++)
        if( ( fichier.lastIndexOf(Allowedextensionsimg[i]) ) != -1)
        {
            return 1;
        }
    for (var j = 0; j < Allowedextensionsvideo.length; j++)
        if( ( fichier.lastIndexOf(Allowedextensionsvideo[j]) ) != -1)
        {
            return 2;
        }
    return 0;
}


function Chargerphoto(idform)
{
    var fichier = document.getElementById("img"+idform);
    (isValide(fichier.value)!=0) ?
        (
            fileReader=new FileReader(),
                (isValide(fichier.value)==1) ?
                    (
                        chaine='<img alt="" class="thumbnail" style="width: 100%;height: 135px;margin-bottom: 10px;" id="affimg'+idform+'">'
                    ):(
                        chaine='<video controls autoplay style="width:260px;height:135px;margin-bottom:10px;" class="img-responsive" id="affimg'+idform+'"></video>'
                    ),
                $("#afffichier"+idform).html(chaine),
                fileReader.onload = function (event) { $("#affimg"+idform).attr("src",event.target.result);},
                fileReader.readAsDataURL(fichier.files[0])
        ):(
            alert("L'extension du fichier choisi ne correspond pas aux règles sur les fichiers pouvant être uploader"),
                $('#img'+idform).val(""),
                $('#affimg'+idform).attr("src",""),
                $('.input-modal').val("")
        );
}
