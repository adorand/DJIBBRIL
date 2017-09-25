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

                /*lorsque la requete contient des paramètres, il faut decouper pour recupérer le tableau*/
                factory.data=response['data']['data'][!element.indexOf('(')!=-1 ? element.split('(')[0] : element];
                deferred.resolve(factory.data);
            }, function errorCallback(response) {
                deferred.reject("Impossible de récupérer les "+element+" depuis le serveur distant");
            });
            return deferred.promise;
        },
        saveElement:function (element,data) {
            var deferred=$q.defer();
            $http({
                method: 'POST',
                url: '/'+element,
                headers: {
                    'Content-Type': 'application/json'
                },
                data:data
            }).then(function successCallback(response) {
                factory.data=response['data']['data'];
                deferred.resolve(factory.data);
            }, function errorCallback(response) {
                deferred.reject("Impossible de récupérer les "+element+"s depuis le serveur distant");
            });
            return deferred.promise;
        },
        removeElement:function (element,code) {
            var deferred=$q.defer();
            $http({
                method: 'DELETE',
                url: '/'+element+'/'+code,
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function successCallback(data) {
                factory.data=data;
                deferred.resolve(factory.data);
            }, function errorCallback(response) {
                deferred.reject("Erreur lors de la suppression");
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
        .when("/user", {
            templateUrl : "user.blade.php",
        });
});

app.controller('BackEndCtl',function (Init,$location,$scope,$q,$route)
{

    //get authentified user
    Init.saveElement('auth', null).then(function (data)
    {
        $scope.auth=data['users'][0];
    },function (msg)
    {
        toastr.error(msg);
    });

    var listofrequests =
    [
        {"categories" : " code, nom, description, created_at, updated_at, surface_code, souscategories { code, nom, description, created_at, updated_at, parent { code, nom }, produits { code, designation, description, quantite, prix image, created_at, updated_at, souscategorie { code,nom } } }"},
        {"surfaces"   : " code, nom, image,  created_at, updated_at,  user { code, username, email, password, image }" },
        {"membres"    : " code, nom, email, telephone, password, image, created_at, updated_at" },
        {"roles"      : " id, name " },
        {"users"      : " code, username, email, image, created_at, updated_at, roles{ id,name } " }
    ];

    //LISTE DES CATEGORIES
    $.each(listofrequests[0],function (element, listeattributs)
    {
        $('#surface_code').val() ? element='categories( surface_code : "'+$('#surface_code').val()+'")' : '';
        $scope.surface_code=$('#surface_code').val();
        Init.getElement(element, listeattributs).then(function (data)
        {
            $scope.categories=data;
        },function (msg)
        {
            toastr.error(msg);
        });
    });


    //Liste des surfaces au chargement => Pour initialisation au niveau de la Page produit => Element select
    $.each(listofrequests[1],function (element, listeattributs)
    {
        Init.getElement(element, listeattributs).then(function (data)
        {
            $scope.surfaces=data;
        },function (msg)
        {
            toastr.error(msg);
        });
    });

    $scope.linknav="/";

    $scope.$on('$routeChangeStart', function(next, current)
    {
        $scope.linknav=$location.path();
        if(angular.lowercase(current.templateUrl).indexOf('produit')!=-1)
        {
            console.log(JSON.stringify($scope.categories));
        }
        else if(angular.lowercase(current.templateUrl).indexOf('surface')!=-1)
        {
            $.each(listofrequests[1],function (element, listeattributs)
            {
                Init.getElement(element, listeattributs).then(function (data)
                {
                    $scope.surfaces=data;
                },function (msg)
                {
                    toastr.error(msg);
                });
            });
        }
        else if(angular.lowercase(current.templateUrl).indexOf('membre')!=-1)
        {
            $.each(listofrequests[2],function (element, listeattributs)
            {
                Init.getElement(element, listeattributs).then(function (data)
                {
                    $scope.membres=data;
                },function (msg)
                {
                    toastr.error(msg);
                });
            });
        }
        else if(angular.lowercase(current.templateUrl).indexOf('user')!=-1)
        {
            $.each(listofrequests[3],function (element, listeattributs)
            {
                Init.getElement(element, listeattributs).then(function (data)
                {
                    $scope.roles=data;
                },function (msg)
                {
                    toastr.error(msg);
                });
            });

            $.each(listofrequests[4],function (element, listeattributs)
            {
                Init.getElement(element, listeattributs).then(function (data)
                {
                    $scope.users=data;
                },function (msg)
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
        (type.indexOf('souscategorie')!=-1) ?
        (
            $("#codesouscategorie").val(""),
            $("#nomsouscategorie").val(""),
            $("#code_parentsouscategorie").val(""),
            $("#codecategoriesouscategorie").val("")
        )
        :(type.indexOf('categorie')!=-1) ?
        (
            $("#codecategorie").val(""),
            $("#nomcategorie").val("")
        )
        :(type.indexOf('produit')!=-1) ?
        (
            $("#codeproduit").val(""),
            $("#designationproduit").val(""),
            $("#souscategorieproduit").val(""),
            $("#codesouscategorieproduit").val(""),
            $("#quantiteproduit").val(""),
            $("#prixproduit").val(""),
            $("#imgproduit").val(""),
            $('.input-modal').val(""),
            $("#affimgproduit").attr('src',''),
            $("#imgproduit").attr('required',true)
        )
        :(type.indexOf("surface")!=-1) ?
        (
            $("#codesurface").val(""),
            $("#nomsurface").val(""),
            $("#emailsurface").val(""),
            $("#passwordsurface").val(""),
            $("#passwordsurface").attr('required',true),
            $("#confirmpasswordsurface").val(""),
            $("#confirmpasswordsurface").attr('required',true),
                $('.input-modal').val(""),
            $("#imgsurface").attr('required',true),
            $("#affimgsurface").attr('src','')
        )
        :(type.indexOf("membre")!=-1) ?
        (
            $("#codemembre").val(""),
            $("#nommembre").val(""),
            $("#emailmembre").val(""),
            $("#telephonemembre").val(""),
            $("#passwordmembre").val(""),
            $("#passwordmembre").attr('required',true),
            $("#imgmembre").attr('required',true),
            $("#affimgmembre").attr('src',''),
            $('.input-modal').val("")
        ): '' ;
        return dfd.promise();
    }


    $scope.showModalAdd=function (type,vide)
    {
        emptyform(type);
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
        console.log(data);
        (continuer) ?
            $.ajax
            (
                {
                    url:'/'+(type.indexOf('souscategorie')!=-1 ? 'categorie' : type),
                    type:'POST',
                    contentType:false,
                    processData:false,
                    DataType:'json',
                    data:data,
                    success:function(data)
                    {
                        var obj=data['data'][type+'s'][0];
                        console.log(obj);
                        (type.indexOf('souscategorie')!=-1) ?
                        (
                            $.each($scope.categories,function (ctg,categorie)
                            {
                                (categorie.code==$('#codecategoriesouscategorie').val()) ?
                                (
                                    $.each($scope.categories[ctg].souscategories,function (ssctg,souscategorie)
                                    {
                                        if (souscategorie.code==obj.code)
                                        {
                                            $scope.$apply(function () {
                                                $scope.categories[ctg].souscategories.splice(ssctg,1);
                                            });
                                            return false;
                                        }
                                    })
                                ) : '' ;

                                if(categorie.code==obj.parent.code)
                                {
                                    $scope.$apply(function () {
                                        $scope.categories[ctg].souscategories.splice(0,0,obj);
                                    });
                                    return false;
                                }
                            })
                        )
                        :(type.indexOf('categorie')!=-1) ?
                        (
                            obj.updated_at==obj.created_at ?
                                $scope.categories.splice(0,0,obj)
                            :
                            $.each($scope.categories,function (key,value)
                            {
                                (value.code==obj.code) ? $scope.categories[key]=obj : '';
                            })
                        )
                        :(type.indexOf('produit')!=-1) ?
                        (
                            $.each($scope.categories,function (ctg,categorie)
                            {
                                $.each($scope.categories[ctg].souscategories,function (ssctg,souscategorie)
                                {
                                    if (souscategorie.code==$('#codesouscategorieproduit').val())
                                    {
                                        $.each($scope.categories[ctg].souscategories[ssctg].produits,function (prod,produit)
                                        {
                                            if (produit.code==obj.code)
                                            {
                                                $scope.$apply(function () {
                                                    $scope.categories[ctg].souscategories[ssctg].produits.splice(prod,1);
                                                });
                                                return false;
                                            }
                                        })
                                    }

                                    if(souscategorie.code==obj.souscategorie.code)
                                    {
                                        $scope.$apply(function () {
                                            $scope.categories[ctg].souscategories[ssctg].produits.splice(0,0,obj);
                                        });
                                        return false;
                                    }
                                })


                            })
                        )
                        :(type.indexOf('surface')!=-1) ?
                        (
                            obj.updated_at==obj.created_at ?
                                $scope.surfaces.splice(0,0,obj)
                            :
                            $.each($scope.surfaces,function (key,value)
                            {
                                (value.code==obj.code) ? $scope.surfaces[key]=obj : '';
                            })
                        )
                        :(type.indexOf('membre')!=-1) ?
                        (
                            obj.updated_at==obj.created_at ?
                                $scope.membres.splice(0,0,obj)
                            :
                            $.each($scope.membres,function (key,value)
                            {
                                (value.code==obj.code) ? $scope.membres[key]=obj : '';
                            })
                        ): '';
                        $scope.$apply();
                        toastr.success('SUCCÈS!', angular.uppercase(type) , { extendedTimeOut: 100000, TimeOut: 5000000});
                        $scope.reinitTrie();
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


    $scope.showModalUpdate=function (type,element)
    {
        $scope.showModalAdd(type);
        (type.indexOf("souscategorie")!=-1) ?
        (
            $("#codesouscategorie").val(element.code),
            $("#nomsouscategorie").val(element.nom),
            $("#code_parentsouscategorie").val(element.parent.code),
            $("#codecategoriesouscategorie").val(element.parent.code)
        )
        :(type.indexOf("categorie")!=-1) ?
        (
            $("#codecategorie").val(element.code),
            $("#nomcategorie").val(element.nom)
        )
        :(type.indexOf("produit")!=-1) ?
        (
            $("#codeproduit").val(element.code),
            $("#designationproduit").val(element.designation),
            $("#souscategorieproduit").val(element.souscategorie.code),
            $("#codesouscategorieproduit").val(element.souscategorie.code),
            $("#quantiteproduit").val(element.quantite),
            $("#prixproduit").val(element.prix),
            $("#imgproduit").attr('required',false),
            $("#affimgproduit").attr('src','data:image/png;base64,'+element.image)
        )
        :(type.indexOf("surface")!=-1) ?
        (
            $("#codesurface").val(element.code),
            $("#nomsurface").val(element.nom),
            $("#emailsurface").val(element.user.email),
            $("#passwordsurface").attr('required',false),
            $("#confirmpasswordsurface").attr('required',false),
            $("#imgsurface").attr('required',false),
            $("#affimgsurface").attr('src','data:image/png;base64,'+element.image)
        )
        :(type.indexOf("membre")!=-1) ?
        (
            $("#codemembre").val(element.code),
            $("#nommembre").val(element.nom),
            $("#emailmembre").val(element.email),
            $("#telephonemembre").val(parseInt(element.telephone)),
            $("#passwordmembre").attr('required',false),
            $("#imgmembre").attr('required',false),
            $("#affimgmembre").attr('src','data:image/png;base64,'+element.image)
        )
        :(type.indexOf("user")!=-1) ?
        (
            $("#codemembre").val(element.code),
            $("#nommembre").val(element.nom),
            $("#emailmembre").val(element.email),
            $("#telephonemembre").val(parseInt(element.telephone)),
            $("#passwordmembre").attr('required',false),
            $("#imgmembre").attr('required',false),
            $("#affimgmembre").attr('src','data:image/png;base64,'+element.image)
        ) : '';
    };

    $scope.searchsurfacecategorie="";
    $scope.modif=function () {
        $scope.searchsurfacecategorie=$('#searchsurfacecategorie').val();

        console.log($scope.searchsurfacecategorie);
    };

    $scope.searchsurfacecategorie=""
    $scope.trierElement=function (type,element,propriete="")
    {
        console.log(type+'trier=>'+element.code);
        (type.indexOf('souscategorie')!=-1) ?
        (
            propriete.match('code') ?
                $scope.searchcodesouscategorie = element.code
            : ''
        )
        : (type.indexOf('categorie')!=-1) ?
        (
            propriete.match('code') ?
                $scope.searchcodecategorie =element.code
            : propriete.match('surface') ?
                $scope.searchsurfacecategorie=$('#searchsurfacecategorie').val()
            :$searchnomcategorie = $scope.searchcodecategorie = $scope.searchsurfacecategorie = ''
        )
        : (type.indexOf('membre')!=-1) ?
        (
            propriete.match('nom') ?
                $scope.searchnommembre=element.nom
            :  $scope.searchnommembre=''
        )
        : '' ;
    };


    $scope.reinitTrie=function ()
    {
        $('#searchnomsouscategorie').val("");
        $('#searchnomcategorie').val('');
    };

    $scope.deleteElement=function (type,element)
    {
        var msg='Confirmer cette suppression ???';

        var sortir=true;
        (type.indexOf('souscategorie')!=-1) ?
        (
            $.each($scope.categories,function (ctg,categorie)
            {
                if(categorie.code == element.parent.code)
                {
                    $.each($scope.categories[ctg].souscategories, function (ssctg, souscategorie) {
                        if (souscategorie.code == element.code && souscategorie.produits.length>0 ) {
                            msg="Cette sous-catégorie contient des produits à son actif, la suppression de cette dernière entrainera la suppression de tous ses produits\n"+msg;
                            sortir = false;
                        }
                        return sortir;
                    })
                }
                return sortir;
            })
        )
        : (type.indexOf('categorie')!=-1) ?
        (
            $.each($scope.categories,function (ctg,categorie)
            {
                (categorie.code == element.code && categorie.souscategories.length>0) ?
                (
                    msg="Cette catégorie contient des sous-produits à son actif\n"+msg,
                    sortir = false
                ): ''
                return sortir
            })
        )
        : (type.indexOf('surface')!=-1) ?
        (
            $.each($scope.categories,function (ctg,categorie)
            {
                (categorie.surface_code == element.code) ?
                (
                    msg="Cette surface est reliée à des catégories\n"+msg,
                    sortir = false
                ): ''
                return sortir
            })
        )
        : (type.indexOf('membre')!=-1) ?
        (
            $.each($scope.membres,function (mbr,membre)
            {
                (membre.code == element.code) ?
                (
                    msg="Cette surface est reliée à des catégories\n"+msg,
                    sortir = false
                ): ''
                return sortir
            })
        ): '';



        Reponse=confirm(msg);
        if(Reponse==false)
        {
            toastr.error('ANNULÉE','SUPPRESSION');
        }
        else
        {
            Init.removeElement((type.indexOf('souscategorie')!=-1 ? 'categorie' : type), element.code).then(function (data)
            {
                sortir=true;
                console.log(data);
                (type.indexOf('souscategorie')!=-1) ?
                (

                    $.each($scope.categories,function (ctg,categorie) {
                        (categorie.code == element.parent.code) ?
                        (
                            $.each($scope.categories[ctg].souscategories, function (ssctg, souscategorie) {
                                if (souscategorie.code == element.code) {
                                    $scope.categories[ctg].souscategories.splice(ssctg, 1);
                                    sortir = false;
                                }
                                return sortir;
                            })
                        ): ''
                        return sortir
                    })
                )
                :(type.indexOf('categorie')!=-1) ?
                (

                    $.each($scope.categories,function (ctg,categorie)
                    {
                        (categorie.code == element.code) ?
                        (
                            $scope.categories.splice(ctg, 1),
                            sortir = false
                        ): ''
                        return sortir
                    })
                )
                :(type.indexOf('produit')!=-1) ?
                (

                    $.each($scope.categories,function (ctg,categorie)
                    {
                        $.each($scope.categories[ctg].souscategories, function (ssctg, souscategorie)
                        {
                            if (souscategorie.code == element.souscategorie.code)
                            {

                                $.each($scope.categories[ctg].souscategories[ssctg].produits, function (prod, produit) {
                                    if (produit.code == element.code) {
                                            $scope.categories[ctg].souscategories[ssctg].produits.splice(prod, 1);
                                        sortir=false;
                                    }
                                    return sortir;
                                })
                            }
                            return sortir;
                        });
                        return sortir;
                    })
                )
                :(type.indexOf('surface')!=-1) ?
                (
                    $.each($scope.surfaces,function (surf,surface)
                    {
                        (surface.code == element.code) ?
                        (
                            $scope.surfaces.splice(surf, 1),
                                sortir = false
                        ): ''
                        return sortir
                    })
                )
                :(type.indexOf('membre')!=-1) ?
                (
                    $.each($scope.membres,function (surf,surface)
                    {
                        (surface.code == element.code) ?
                        (
                            $scope.membres.splice(surf, 1),
                                sortir = false
                        ): ''
                        return sortir
                    })
                ): '';
                $scope.reinitTrie();
                toastr.success('SUCCÈS','SUPPRESSION');
            },function (msg)
            {
                toastr.error(msg);
            });
        }
    };

    $scope.showView=function(view)
    {
        alert($('#'+view).find('.hide'));
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
