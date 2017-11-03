<section class="vbox panel">
    <section class="wrapper scrollable ">
        <div class="content-top clearfix animated zoomIn" style="padding-right: 21px;padding-left: 21px;">
            <h1 class="al-title text-u-c">commandes</h1>
            <ul class="breadcrumb al-breadcrumb no-borders fontpacifico" >
                <li>
                    <a href="accueil.html" style="color: #209e91;text-decoration: none !important; transition: color 0.2s ease;">KDI BackEND</a></li>
                <li class="text-u-c">commandes</li>
            </ul>
        </div>
        <section class="hbox stretch panel">
            <aside class="no-padder">
                <section class="hbox stretch panel">
                    <aside>
                        <section class="vbox">
                            <header class="header panel b-b clearfix">
                                <div class="row m-t-sm">
                                    <div class="col-xs-7 col-sm-8 m-b-xs">
                                        <a href="#viewfunctions" target="_self" data-toggle="class:hide" class="btn btn-sm bg-white active">
                                            <i class="fa fa-caret-left text fa-lg"></i>
                                            <i class="fa fa-caret-right text-active fa-lg"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm bg-templateblue" data-toggle="tooltip" data-placement="top" data-title="Rafraichir la liste des utilisateurs">
                                                <i class="fa fa-refresh text-white"></i>
                                            </button>
                                        </div>
                                        <a class="btn btn-sm bg-templateblue cursor-pointer" data-toggle="tooltip" data-placement="top" data-title="Ajouter un utilisateur"  ng-click="showModalAdd('user')">
                                            <i class="fa fa-user-plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="col-xs-5 col-sm-4 m-b-xs">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm no-borders" placeholder="Recherher" ng-model="searchusernameuser">
                                            <span class="input-group-btn border-radius">
                                                <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <section class="with-scroll scrollable wrapper">
                                <div class="with-scroll table-panel">
                                    <div class="panel with-scroll animated zoomIn">
                                        <div class="row" >
                                            <div class="row text-center-xs m-l-xs m-t-sm m-b">
                                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                                    <a class="btn btn-sm on animated zoomInUp btnanswer m-t-sm box-shadow" href="#!/commande" >
                                                        <i class="fa fa-chevron-left text-white"></i> <strong class="text-white text-u-c">Retour</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row row-sm scrollable " >
                                            <div class="with-scroll table-panel">
                                                <div class="panel with-scroll table-panel animated fadeIn">
                                                    <div class="panel panel-heading clearfix">
                                                        <h3 class="panel-title text-white"><strong>Liste des plats</strong></h3>
                                                    </div>
                                                    <div class="panel-body" style="height: 500px;">
                                                        <div class="">
                                                            <div class="horizontal-scroll">
                                                                <table class="table table-hover">
                                                                    <thead>
                                                                        <tr class="black-muted-bg">
                                                                            <th class="browser-icons"></th>
                                                                            <th>Nom du plat</th>
                                                                            <th class="text-center">PU</th>
                                                                            <th class="text-center">Quantité</th>
                                                                            <th class="text-center">Montant</th>
                                                                            <th class="align-right"><i class="fa fa-check"></i></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="scrollable">
                                                                        <tr>
                                                                            <td><img width="50" height="50" src="images/p1.jpg" style="border-radius: 25px;"></td>
                                                                            <td>Google Chrome</td>
                                                                            <td class="text-center">10 000</td>
                                                                            <td class="text-center">10</td>
                                                                            <td class="text-center">100 000</td>
                                                                            <td class="check-td">
                                                                                <div class="checkbox i-checks">
                                                                                    <label><input type="checkbox" checked=""><i></i></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="col-xs-12 col-sm-12 col-md-8 pull-right m-t">
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btnanswer" type="button" data-toggle="tooltip" data-placement="left" data-title="POUR UNE COMMANDE A CREDIT" onclick="showModal('modal-creditcli')">
                                                                                <i class="fa fa-user-plus text-white"></i>
                                                                            </button>
                                                                        </span>
                                                                        <input type="number" class="text-center form-control" id="montantremis" placeholder="Montant réglé">
                                                                        <span class="input-group-btn">
                                                                                        <button type="button" class="btn btnanswer btn-with-icon" onclick="showModal('modal-creditclient')">
                                                                                            <i class="fa fa-arrow-right text-white"></i>
                                                                                            <strong class="text-u-c text-white">Régler</strong>
                                                                                            <i class="fa fa-book text-white"></i>
                                                                                        </button>
                                                                                    </span>
                                                                    </div>
                                                                    <button type="button" class="btn btnanswer m-t m-l m-b btn-with-icon pull-right"><strong class="text-u-c text-white">valider</strong> <i class="fa fa-check text-white"></i></button>
                                                                    <button type="button" class="btn btnanswer m-t m-b btn-with-icon pull-right" onclick="showModal('modal-motif')"><strong class="text-u-c text-white">Annuler</strong> <i class="fa fa-times-rectangle text-white"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </section>
                            <footer class="footer bg-templateblue">
                                <div class="row text-center-xs">
                                    <div class="col-md-6 hidden-sm">
                                        <p class=" m-t text-white">Affichage par pas de 10</p>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-right text-center-xs">
                                        <ul class="pagination pagination-sm m-t-sm m-b-none">
                                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </aside>
                </section>
            </aside>




        </section>
        <div class="row wrapper">
            <!--Partie vue des commandes-->
            <section class="row panel m-l-md m-r-md" id="panelviewcmd">
                <div class="col-xs-12 col-sm-12" style="height: 100%;border-bottom-right-radius: 5px;border-top-right-radius: 5px;border-left: 2px solid rgba(0, 0, 0, 0.50);box-shadow: -2px 0 0 0 rgba(255, 255, 255, 0.30);">

                    <!--TRAITEMENT D'UNE COMMANDE SPECIFIQUE-->

                    <section id="traitcmd" class="hide">
                        <div class="row" >
                            <div class="row text-center-xs m-l-xs m-t-sm m-b">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                    <button class="btn btn-sm on animated zoomInUp btnanswer m-t-sm box-shadow" href="#traitcmd, #viewcmd" data-toggle="class:hide,hide">
                                        <i class="fa fa-chevron-left text-white"></i> <strong class="text-white text-u-c">Retour</strong>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </section>


                    <!--AFFICHAGE DES COMMANDES-->

                </div>
            </section>


            <!--PARTIE D4AJOUT D'UNE COMMANDE-->
            <section class="hide" id="paneladdcmd">
                <div class="row">
                    <!-- liste des plats-->
                    <div class="col-md-5" >
                        <div class="panel-nouvcmd-menu m-r-n-sm m-l-n-sm">
                            <div class="panel-body panel">
                                <div class="row row-sm wrapper scrollable listeplats" style="height:100%;">
                                    <div class="list-group-item typecmd_reg m-t-n" style="border: none;">
                                                                <span class="pull-right" >
                                                                    <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                    <a href="#">Qte</a>
                                                                    <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                    <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; ">PU</a>
                                                                    <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; ">Total Plat</a>
                                                                    <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                </span>
                                        <div class="text-ellipsis">
                                            Nom du Plat
                                        </div>
                                    </div>
                                    <ul class="list-group gutter list-group-lg list-group-sp panel scrollable" style="height:535px;">
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>

                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right" >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                        <li class="list-group-item panel on animated zoomIn">
                                                                    <span class="pull-right " >
                                                                        <a href="#"><i class="fa fa-minus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#">2</a>
                                                                        <a href="#"><i class="fa fa-plus-circle fa-fw m-r-xs"></i></a>
                                                                        <a href="#" class="bg-white" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#" class="typecmd_reg" style="padding: 5px;border-radius: 5px; box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.25);">10000</a>
                                                                        <a href="#"><i class="fa fa-times-circle fa-fw"></i></a>
                                                                    </span>
                                            <div class="text-ellipsis">
                                                <strong>Pizza Norvegienne</strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row row-sm wrapper m-b-n-lg m-t-n-lg">
                                    <ul class="list-group panel">
                                        <li class="list-group-item panel text-u-c i-2x">
                                            <p>
                                            <div class="pull-left">
                                                <strong>05</strong> <i class="fa fa-cutlery "></i>
                                            </div>
                                            <div class="pull-right">
                                                10 000 Fcfa
                                            </div>
                                            </p>
                                            <br/>
                                            <p class="text-center">
                                                <button type="button" onclick="showaddcmd(1)" class="btn typecmd_reg text-white m-t-lg box-shadow text-u-c"><i class="fa fa-check"></i> valider la commande</button>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /listes des plats-->

                    <div class="clearfix visible-xs"></div>


                    <!-- ITEM FOR ADD PLAT TO CMD -->
                    <div class="col-md-7">

                        <!--CATEGORIES-->
                        <div class="scrollable-w panel">
                            <div class="panel sortable">
                                <div class="panel panel-heading b-b">
                                    <div class="text-white text-u-c pull-left m-t-n-xxs" >
                                        <i class="fa fa-th-large"></i> <strong>Catégories</strong>
                                    </div>
                                    <div class="input-group pull-right m-t-n-xs" style="width: 40%">
                                        <input type="text" class="form-control input-sm no-borders" placeholder="">
                                        <span class="input-group-btn border-radius">
                                                                    <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-l-xs m-r">
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_ann">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(99,28,28,0.77);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_ann">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(99,28,28,0.77);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_ann">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(99,28,28,0.77);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_ann">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(99,28,28,0.77);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--SOUS-CATEGORIES-->
                        <div class="scrollable-w panel">
                            <div class="panel sortable">
                                <div class="panel panel-heading b-b">
                                    <div class="text-white text-u-c pull-left m-t-n-xxs">
                                        <i class="fa fa-th-list"></i> <strong>Sous-Catégories</strong>
                                    </div>
                                    <div class="input-group pull-right m-t-n-xs" style="width: 40%">
                                        <input type="text" class="form-control input-sm no-borders" placeholder="">
                                        <span class="input-group-btn border-radius">
                                                                    <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-l-xs m-r">
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_val">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(65,78,18,0.94);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_val">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(65,78,18,0.94);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_val">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(65,78,18,0.94);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_val">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(65,78,18,0.94);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--PLATS-->
                        <div class="scrollable-w panel">
                            <div class="panel sortable">
                                <div class="panel panel-heading b-b">
                                    <div class="text-white text-u-c pull-left m-t-n-xxs">
                                        <i class="fa fa-cutlery"></i> <strong>PLATS</strong>
                                    </div>
                                    <div class="input-group pull-right m-t-n-xs" style="width: 40%">
                                        <input type="text" class="form-control input-sm no-borders" placeholder="">
                                        <span class="input-group-btn border-radius">
                                                                    <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
                                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-l-xs m-r">
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_reg">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(25,22,10,0.68);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_reg">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(25,22,10,0.68);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_reg">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(25,22,10,0.68);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 on animated zoomIn">
                                    <div class="item-menu-nouvcmd panel typecmd_reg">
                                        <a href="#"><img src="images/menus/sr-1.jpg" style="height: 80px;width: 80px;border-radius: 40px;box-shadow: inset 0 0 2px 1px rgba(255,255,255,0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);margin-bottom: 10px;" alt=""></a>
                                        <div class="caption" style="background-color: rgba(25,22,10,0.68);" >
                                            <p class="text-ellipsis m-b-none text-white"><strong>Phasellus at ultricies neque</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ITEM FOR ADD PLAT TO CMD -->



                </div>
            </section>

        </div>
    </section>
</section>