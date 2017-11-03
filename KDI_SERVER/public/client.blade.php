<section class="vbox">
    <section class=" wrapper scrollable">
        <div class="content-top clearfix animated zoomIn" style="padding-right: 21px;padding-left: 21px;">
            <h1 class="al-title text-u-c">CLIENTS</h1>
            <ul class="breadcrumb al-breadcrumb no-borders fontpacifico" >
                <li>
                    <a href="accueil.html" style="color: #209e91;text-decoration: none !important; transition: color 0.2s ease;">KDI BackEND</a></li>
                <li class="text-u-c">CLIENTS</li>
            </ul>
        </div>
        <section class="hbox stretch panel">
            <!--List of User-->
            <aside class="no-padder">
                <section class="hbox stretch panel">

                    <aside>
                        <section class="vbox">
                            <header class="header panel b-b clearfix">
                                <div class="row m-t-sm">
                                    <div class=" col-xs-7 col-sm-8 m-b-xs">
                                        <a class="btn btn-sm bg-templateblue cursor-pointer" data-toggle="tooltip" data-placement="top" title="Rafraichir" ng-click="trierElement('client','','')">
                                            <i class="fa fa-refresh text-white"></i>
                                        </a>
                                        <a class="btn btn-sm bg-templateblue cursor-pointer" data-toggle="tooltip" data-placement="top" title="Ajouter un utilisateur" ng-click="showModalAdd('client')" >
                                            <i class="fa fa-user-plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class=" col-xs-5 col-sm-4 m-b-xs">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm no-borders" placeholder="Rechercher" id="searchnomclient" ng-model="searchnomclient">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-sm bg-white">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <section class="scrollable wrapper w-f">
                                <div ng-repeat="client in clients | filter : { nom : searchnomclient } | orderBy:'-updated_at' track by $index" class="col-xs-6 col-sm-4 col-md-2 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg " ng-class="  { 'clientbtns' : surface_code=='' } " style="margin-top: -45px;">

                                            <button ng-if="!surface_code" class="btn btn-sm btn-client bg-templateblue animated fadeIn" type="button" ng-click="showModalUpdate('client', client)">
                                                <i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="top" title="Editer le client"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle" type="button" style="background:transparent;border-radius: 50%;">
                                                <img src=" {{ client.image ? client.image  : 'images/login-w-icon.png' }} " class="img-circle" style="height: 90px;width: 90px;box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6)">
                                            </button>
                                            <!--
                                            <button  class="btn btn-sm btn-client-middle img-circle" type="button" style="height: 90px;width: 90px;background:url('images/djibbril.jpg') no-repeat;background-size:cover;box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);border-radius: 50%;">
                                            </button>
                                            -->
                                            <button ng-if="!surface_code"  class="btn btn-sm btn-client bg-templateblue animated fadeIn" type="button" ng-click="deleteElement('client', client)"  >
                                                <i class="fa fa-user-times text-white" data-toggle="tooltip" data-placement="top" title="Supprimer le client"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" title="N° {{client.code}}"> <i class="fa fa-user-secret fa-lg"></i> <strong class="text-u-l">{{client.code}}</strong></p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c" data-toggle="tooltip" data-placement="top" title="{{client.nom}}"><i class="i i-users2 fa-lg"></i> <strong class="text-u-l">{{client.nom}}</strong></p>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <footer class="footer bg-templateblue">
                                <div class="row text-center-xs">
                                    <div class="col-md-6 hidden-sm">
                                        <button class="btn btn-sm bg-white m-t-sm box-shadow">Charger plus</button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-right text-center-xs">
                                        <ul class="pagination pagination-sm m-t-sm m-b-none">
                                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                            <li class="active"><a href="#">2</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">10</a></li>
                                            <li><a href="#">15</a></li>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </aside>
                </section>
            </aside>
            <!--List of User-->

        </section>
    </section>
</section>