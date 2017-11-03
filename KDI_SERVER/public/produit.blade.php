<!-- App -->


<section class="vbox">
    <section class="wrapper scrollable">
        <div class="content-top clearfix animated zoomIn" style="padding-right: 21px;padding-left: 21px;">
            <div class="row">
                <div class="col-sm-4">
                    <h1 class="al-title">
                        PRODUITS
                        <button class="btn btn-sm bg-white btn-rounded btn-icon"  data-toggle="tooltip" data-placement="bottom" data-title="RAFRAICHIR LES CATEGORIES"  ng-click="trierElement('categorie','','')">
                            <i class="fa fa-refresh"></i>
                        </button>
                    </h1>
                </div>
                <div class="col-sm-3">
                    <div class="input-group m-t-n-xs" ng-if="surface_code==''">
                        <select class="form-control input-sm no-borders text-u-c" id="searchsurfacecategorie" ng-model="searchsurfacecategorie" ng-change="trierElement('categorie','','surface')">
                            <option selected value="">Trier par surface</option>
                            <option ng-repeat="surface in surfaces" value="{{surface.user.code}}">{{surface.nom}}</option>
                        </select>
                        <span class="input-group-btn border-radius">
                            <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon" ng-disabled="searchsurfacecategorie==''" ng-click="trierElement('categorie','','surface')"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-sm-5">
                    <ul class="breadcrumb al-breadcrumb no-borders fontpacifico">
                        <li>
                            <a href="#!/" style="color: #209e91;text-decoration: none !important; transition: color 0.2s ease;">KDI BackEND</a>
                        </li>
                        <li>PRODUITS</li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="row">

            <!-- Categories-->
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel" style="margin-bottom: 0px !important;">
                        <div class="panel panel-heading b-b " style="margin-bottom: 0px !important;">
                            <div class="text-white text-u-c pull-left m-t-n-xxs">
                                <i class="fa fa-th-large"></i> <strong>Catégories</strong>
                            </div>
                            <button class="btn btn-sm bg-white btn-rounded btn-icon pull-right" data-toggle="tooltip" data-placement="left" title="Ajouter une catégorie" ng-click="showModalAdd('categorie')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group m-t m-b m-l m-r" >
                        <input type="text" class="form-control input-sm no-borders" placeholder="Rechercher une catégorie" id="searchnomcategorie" ng-model="searchnomcategorie">
                        <span class="input-group-btn border-radius">
                            <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <ul class="list-group gutter list-group-lg list-group-sp panel scrollable" style="height:540px;">
                        <li ng-repeat="categorie in categories | filter: {nom: searchnomcategorie, surface_code : searchsurfacecategorie } | orderBy:'-updated_at' track by $index" class="list-group-item  typecmd_ann panel on animated zoomIn m-t m-r m-l" style="border-radius: 5px;">
                            <span class="pull-right">
                                <button  class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Editer cette catégorie" ng-click="showModalUpdate('categorie', categorie)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Supprimer cette catégorie" ng-click="deleteElement('categorie', categorie)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" ng-class="{'typecmd_val active':categorie.code==searchcodecategorie}" data-toggle="tooltip" data-placement="top" title="Liste des sous-catégories" ng-click="trierElement('categorie',categorie,'code')">
                                    <i class="fa fa-th-list text"></i>
                                    <i class="fa fa-th-list text-active text-white"></i>
                                </button>
                            </span>
                            <strong class="text-ellipsis">{{categorie.nom}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Categories-->

            <!-- Sous-Categories-->
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel" style="margin-bottom: 0px !important;">
                        <div class="panel panel-heading b-b " style="margin-bottom: 0px !important;">
                            <div class="text-white text-u-c pull-left m-t-n-xxs">
                                <i class="fa fa-th-list"></i> <strong>Sous-Catégories</strong>
                            </div>
                            <button class="btn btn-sm bg-white btn-rounded btn-icon pull-right" data-toggle="tooltip" data-placement="left" data-title="Ajouter une sous-catégorie" ng-click="showModalAdd('souscategorie')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group m-t m-b m-l m-r" >
                        <input type="text" class="form-control input-sm no-borders" placeholder="Rechercher une sous-catégorie" id="searchnomsouscategorie" ng-model="searchnomsouscategorie">
                        <span class="input-group-btn border-radius">
                            <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <ul class="list-group gutter list-group-lg list-group-sp panel scrollable" style="height:540px;">
                        <div ng-repeat="categorie in categories | filter : { code : searchcodecategorie, surface_code : searchsurfacecategorie }">
                            <li ng-repeat="souscategorie in categorie.souscategories | filter: {nom :searchnomsouscategorie} | orderBy:'-updated_at' track by $index" class="list-group-item  typecmd_val panel on animated zoomIn m-t m-r m-l" style="border-radius: 5px;">
                                <span class="pull-right">
                                    <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Editer cette sous-catégorie" ng-click="showModalUpdate('souscategorie', souscategorie)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Supprimer cette sous-catégorie" ng-click="deleteElement('souscategorie', souscategorie)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Liste des produits" ng-class="{'typecmd_reg active':souscategorie.code==searchcodesouscategorie}" ng-click="trierElement('souscategorie',souscategorie,'code')">
                                        <i class="fa fa-th-large text"></i>
                                        <i class="fa fa-th-large text-active text-white"></i>
                                    </button>
                                </span>
                                <strong class="text-ellipsis">{{souscategorie.nom}}</strong>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- /Sous-Categories-->





            <div class="col-md-6">

                <!-- PRODUITS -->
                <div class="panel">
                    <div class="panel sortable">
                        <div class="panel panel-heading b-b">
                            <div class="text-white text-u-c pull-left m-t-n-xxs">
                                <i class="fa fa-product-hunt"></i> <strong>PRODUITS</strong>
                            </div>
                            <button class="btn btn-sm bg-white btn-rounded btn-icon" data-toggle="tooltip" data-placement="left" data-title="Ajouter un produit" ng-click="showModalAdd('produit')">
                                <i class="fa fa-plus"></i>
                            </button>
                            <div class="input-group pull-right m-t-n-xs" style="width: 40%">
                                <input type="text" class="form-control input-sm no-borders" placeholder="Rechercher un produit" ng-model="searchdesignationproduit">
                                <span class="input-group-btn border-radius">
                                    <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="scrollable " style="height: 580px;" >
                        <div ng-repeat="categorie in categories | filter : { code : searchcodecategorie, surface_code : searchsurfacecategorie }">
                            <div ng-repeat="souscategorie in categorie.souscategories | filter :{ code : searchcodesouscategorie }">
                                <div ng-repeat="produit in souscategorie.produits | filter: {designation :searchdesignationproduit} | orderBy:'-updated_at' track by $index "  class="col-xs-6 col-sm-4 col-md-4 on animated zoomIn" >
                                    <div class="item-menu typecmd_reg panel" style="border:none;">
                                        <div class="caption">
                                            <p class="text-ellipsis text-white" style="font-size:20px;" data-toggle="tooltip" data-placement="bottom" data-title="Produit 1">{{produit.designation}}</p>
                                            <p class="text-ellipsis m-b-none text-white m-t-md">
                                                <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Editer ce produit" ng-click="showModalUpdate('produit', produit)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm bg-white btn-rounded btn-icon m-t-n-xs" data-toggle="tooltip" data-placement="top" title="Supprimer ce produit" ng-click="deleteElement('produit', produit)" ng-if="(surface_code!='' && categorie.surface_code==auth.code) || (surface_code=='')">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </p>
                                        </div>
                                        <a>
                                            <img src="{{produit.image}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <!-- PRODUITS -->
            </div>
        </div>
    </section>
</section>

