<!DOCTYPE html>
<html lang="en" class="app" ng-app="BackEnd">
    <head>
        <meta charset="utf-8" />
        <title>Menu</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/animate.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="css/icon.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="js/chosen/chosen.css" />




    </head>
    <body ng-controller="BackEndCtl">
        <section class="vbox">
            <header class="panel header header-md navbar navbar-fixed-top-xs" style="background: rgba(0, 0, 0, 0.6)">
                <div class="navbar-header aside-md dk">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                        <i class="fa fa-bars text-white"></i>
                    </a>
                    <a href="#!/" class="navbar-brand">
                        <img src="images/logo.png" class="m-r-sm" alt="scale">
                        <strong class="hidden-nav-xs text-white fontpacifico">KDI BackEND</strong>
                    </a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                        <i class="fa fa-cog text-white"></i>
                    </a>
                </div>
                <ul class="nav navbar-nav hidden-xs hidden-sm">
                    <li class="dropdown"  data-toggle="tooltip" data-placement="bottom" data-title="- , + SIDEBAR">
                        <a class="cursor-pointer" ng-click="datatoggle('#nav','nav-xs')">
                            <i class="i i-arrow-left2 text"></i>
                            <i class="i i-arrow-right2 text-active"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav hidden-xs">

                    <li data-toggle="tooltip" data-placement="bottom" data-title="FULLSCREEN">
                        <a class="dropdown-toggle" data-toggle="fullscreen">
                            <i class="fa fa-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                    <li class="hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="i i-chat3"></i>
                            <span class="badge badge-sm up bg-danger count">2</span>
                        </a>
                        <section class="dropdown-menu aside-xl animated flipInY">
                            <section class="panel bg-white">
                                <div class="panel-heading b-light bg-light">
                                    <strong>Vous avez <span class="count">2</span> notifications</strong>
                                </div>
                                <div class=" ">
                                    <a href="#" class="media list-group-item">
                                        <span class="pull-left thumb-sm">
                                            <img src="images/a0.png" alt="..." class="img-circle">
                                        </span>
                                        <span class="media-body block m-b-none">
                                            Une commande de la table 4<br>
                                            <small class="text-muted">01:10:00</small>
                                        </span>
                                    </a>
                                    <a href="#" class="media list-group-item">
                                        <span class="pull-left thumb-sm">
                                            <img src="images/a0.png" alt="..." class="img-circle">
                                        </span>
                                        <span class="media-body block m-b-none">
                                            Une commande de la table 4<br>
                                            <small class="text-muted">01:10:00</small>
                                        </span>
                                    </a>
                                </div>
                                <div class="panel-footer text-sm">
                                    <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                    <a href="#notes" data-toggle="class:show animated fadeInRight">Voir toutes les notifications</a>
                                </div>
                            </section>
                        </section>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="thumb-sm avatar pull-left">
                                <img src="images/login-w-icon.png" alt="...">
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <li>
                                <span class="arrow top"></span>
                                <a href="#">Paramètres</a>
                            </li>
                            <li>
                                <span class="arrow top"></span>
                                <a href="update.password.html" data-toggle="ajaxModal">Modifier Mot de Passe</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge bg-danger pull-right">3</span>
                                    Notifications
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="badge bg-danger pull-right">3</span>
                                    Utilisateurs
                                </a>
                            </li>
                            <li>
                                <a href="#">Aide</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>
            <section>
                <section class="hbox stretch">
                    <!-- Aside -->
                    <aside class="al-sidebar aside-md hidden-print" id="nav">
                        <section class="vbox">
                            <section class="w-f scrollable">
                                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                                    <div class="clearfix wrapper dk nav-user hidden-xs">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <span class="thumb avatar pull-left m-r">
                                                    <img src="images/login-w-icon.png" class="dker" alt="...">
                                                    <i class="on md b-black"></i>
                                                </span>
                                                <span class="hidden-nav-xs clear">
                                                    <span class="block m-t-xs">
                                                        <strong class="font-bold text-lt text-white">{{ Auth::user()->name }}</strong>
                                                        <b class="caret text-white"></b>
                                                    </span>
                                                    <span class="text-muted text-xs block">Administrateur</span>
                                                </span>
                                            </a>
                                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                                <li>
                                                    <span class="arrow top hidden-nav-xs"></span>
                                                    <a href="#">Paramètres</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="badge bg-danger pull-right">3</span>
                                                        Notifications
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="badge bg-danger pull-right">5</span>
                                                        Utilisateurs
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="#">Aide</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- nav -->
                                    <nav class="nav-archenis hidden-xs">
                                        <ul class="nav nav-main" data-ride="collapse">
                                            <li>
                                                <a href="#!/" >
                                                    <i class="fa fa-home text"></i>
                                                    <span class="font-bold">Accueil</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!/produit" >
                                                    <span class="pull-right text-muted">
                                                        <i class="i i-circle-sm-o"></i>
                                                    </span>
                                                    <i class="fa fa-product-hunt"></i>
                                                    <span class="font-bold">Produit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!/surface">
                                                    <span class="pull-right text-muted">
                                                        <i class="i i-circle-sm-o"></i>
                                                    </span>
                                                    <i class="fa fa-home text"></i>
                                                    <span class="font-bold">Surface</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!/membre">
                                                    <span class="pull-right text-muted">
                                                        <i class="i i-circle-sm-o text"></i>
                                                    </span>
                                                    <i class="i i-users3 text"></i>
                                                    <span class="font-bold">Membres</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!/utilisateur">
                                                    <span class="pull-right text-muted">
                                                        <i class="i i-circle-sm-o text"></i>
                                                    </span>
                                                    <i class="fa fa-user-secret text"></i>
                                                    <span class="font-bold">Utilisateurs</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="line dk hidden-nav-xs"></div>
                                    </nav>
                                    <!-- / nav -->
                                </div>
                            </section>
                            <footer class="footer hidden-xs no-padder text-center-nav-xs">
                                <a href="veille.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                                    <i class="i i-logout"></i>
                                </a>
                            </footer>
                        </section>
                    </aside>
                    <!-- /Aside -->

                    <!-- Contenu -->
                    <section id="content" class="menupage" ng-view>

                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                    </section>
                    <!-- /Contenu -->
                </section>
            </section>
        </section>


        <!--MODAL CATEGORIE-->
        <div class="modal fade" id="modal_addcategorie">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-empty">
                    <div class="modal-body ">
                        <div class="row" >
                            <div class="col-sm-12 typecmd_ann m-t-n m-b-n">
                                <div class="row " style="padding-bottom: 15px; ">
                                    <div class="m-t" >
                                        <h3 class="m-t-xs m-l m-b pull-left text-white text-u-c"><strong>Catégorie</strong></h3>
                                        <button data-dismiss="modal" class="b-2x b-white btn btn-sm bg-white active btn-rounded btn-icon pull-right m-r"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="row ">
                                    <form id="form_addcategorie" role="form" enctype="multipart/form-data" accept-charset="UTF-8" ng-submit="addElement($event,'categorie')">

                                        <input type="hidden" id="code_categorie" name="code" value="">
                                        {{ csrf_field() }}
                                        <div class="col-sm-12 m-b">
                                            <input type="text" id="nomcategorie" name="nom" class="form-control input-sm no-borders" placeholder="Nom de la catégorie" required>
                                        </div>
                                        <div class="col-sm-12 text-right m-b">
                                            <button type="submit" class="b-2x b-white btn btn-sm typecmd_ann btn-icon"><i class="fa fa-check text-white"></i></button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--MODAL SOUS-CATEGORIE-->
        <div class="modal fade" id="modal_addsouscategorie">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-empty">
                    <div class="modal-body ">
                        <div class="row" >
                            <div class="col-sm-12 typecmd_val m-t-n m-b-n">
                                <div class="row " style="padding-bottom: 15px; ">
                                    <div class="m-t" >
                                        <h3 class="m-t-xs m-l m-b pull-left text-white text-u-c"><strong>Sous-catégorie</strong></h3>
                                        <button data-dismiss="modal" class="b-2x b-white btn btn-sm bg-white active btn-rounded btn-icon pull-right m-r"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="row ">
                                    <form id="form_addsouscategorie" method="POST" role="form" accept-charset="UTF-8" ng-submit="addElement($event,'souscategorie')">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="code_souscategorie" name="code" value="">
                                        <div class="col-sm-12 m-b">
                                            <input type="text" id="nomsouscategorie" name="nom" class="form-control input-sm no-borders" placeholder="Nom de la sous-catégorie" required>
                                        </div>
                                        <div class="col-sm-12 m-b">
                                            <select class="chosen-select" >
                                                <option disabled selected>Catégorie</option>
                                                <option value="DU">supprimer un utilisateur</option>
                                                <option value="MT">monitorer les tablettes</option>
                                                <option value="AU">Ajouter un utilisateur</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 text-right m-b">
                                            <button type="submit" class="b-2x b-white btn btn-sm typecmd_val btn-icon"><i class="fa fa-check text-white"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--MODAL PRODUIT-->
        <div class="modal fade" id="modal_addproduit">
            <div class="modal-dialog modal-compose">
                <div class="modal-content bg-empty">
                    <div class="modal-body ">
                        <div class="row" >
                            <div class="col-sm-12 typecmd_reg m-t-n m-b-n">
                                <div class="row " style="padding-bottom: 15px; ">
                                    <div class="m-t" >
                                        <h3 class="m-t-xs m-l m-b pull-left text-white text-u-c"><strong>PRODUIT</strong></h3>
                                        <button data-dismiss="modal" class="b-2x b-white btn btn-sm bg-white active btn-rounded btn-icon pull-right m-r"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="row ">
                                    <form id="form_addproduit" method="POST" role="form" enctype="multipart/form-data" accept-charset="UTF-8" ng-submit="addElement($event,'produit')">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="code_produit" name="code_produit" value="">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="designationproduit" name="designation" class="form-control input-sm no-borders" placeholder="Désignation" required>
                                            </div>
                                            <div class="form-group">
                                                <select class="chosen-select" id="souscategorieproduit" name="souscategorie">
                                                    <option disabled selected>Sous-catégorie</option>
                                                    <option value="DU">supprimer un utilisateur</option>
                                                    <option value="MT">monitorer les tablettes</option>
                                                    <option value="AU">Ajouter un utilisateur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="number" id="quantiteproduit" name="quantite" class="form-control input-sm no-borders" placeholder="Quantité" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="number" id="prixproduit" name="prix" class="form-control input-sm no-borders" placeholder="Prix" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" accept='image/*' id="imgproduit" name="image" class="filestyle" data-icon="true" data-classButton="btn bg-white" data-classInput="form-control inline v-middle input-modal" onchange='Chargerphoto("produit")' required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div id="afffichiergalerie" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);">
                                                <img alt="" class="thumbnail" style="width: 100%;height: 135px;margin-bottom: 10px;" id="affimgproduit" >
                                            </div>
                                            <div class="text-right m-b">
                                                <button type="submit" class="b-2x b-white btn btn-sm typecmd_reg btn-icon"><i class="fa fa-check text-white"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.js"></script>
        <!-- Scroll -->
        <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
        <!--Notifications-->
        <script src="js/toastr/toastr.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>


        <script src="js/angular/functions-design.js"></script>

        <!-- BTN UPLOAD -->
        <script src="js/file-input/bootstrap-filestyle.min.js"></script>
        <!--Chosen-->
        <script src="js/chosen/chosen.jquery.min.js"></script>
        <!-- Config Plugins-->
        <script src="js/app.plugin.js"></script>


        <script src="js/angular/angular.min.js"></script>
        <script src="js/angular/angular-route.min.js"></script>
        <script src="js/angular/angular-sanitize.min.js"></script>
        <script src="js/angular/angular-loadscript.js"></script>
        <script src="js/angular/BACKOFFICE.js"></script>


    </body>
</html>