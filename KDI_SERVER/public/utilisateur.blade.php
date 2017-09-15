<section class="vbox">
    <section class="wrapper scrollable">
        <div class="content-top clearfix animated zoomIn" style="padding-right: 21px;padding-left: 21px;">
            <h1 class="al-title">UTILISATEURS</h1>
            <ul class="breadcrumb al-breadcrumb no-borders fontpacifico">
                <li>
                    <a href="accueil.html" style="color: #209e91;text-decoration: none !important; transition: color 0.2s ease;">KDI BackEND</a></li>
                <li>utilisateurs</li>
            </ul>
        </div>
        <section class="hbox stretch panel">
            <!--List of User-->
            <aside class="no-padder">
                <section class="hbox stretch panel">
                    <aside class="aside-md panel dker b-r" id="viewfunctions">
                        <div class="wrapper b-b header"><strong>Rôles</strong>
                            <button class="btn btn-sm bg-info btn-rounded btn-icon pull-right"  data-toggle="tooltip" data-placement="left" data-title="Ajouter un rôle" onclick="showModal('modal-addrole')" style="margin-top: -5px;">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <ul class="nav scrollable animated zoomIn" style="max-height: 400px;">
                            <li class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.12);box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.5);"><a href="#" class="text-ellipsis"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Admin</a></li>
                        </ul>
                    </aside>
                    <aside>
                        <section class="vbox">
                            <header class="header panel b-b clearfix">
                                <div class="row m-t-sm">
                                    <div class="col-xs-7 col-sm-8 m-b-xs">
                                        <a href="#viewfunctions" data-toggle="class:hide" class="btn btn-sm bg-white active">
                                            <i class="fa fa-caret-right text fa-lg"></i>
                                            <i class="fa fa-caret-left text-active fa-lg"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm bg-templateblue" data-toggle="tooltip" data-placement="top" data-title="Rafraichir la liste des utilisateurs">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </div>
                                        <a href="#" class="btn btn-sm bg-templateblue" data-toggle="tooltip" data-placement="top" data-title="Ajouter un utilisateur" onclick="showModal('modal-addUser')">
                                            <i class="fa fa-user-plus text-white"></i>
                                        </a>
                                    </div>
                                    <div class="col-xs-5 col-sm-4 m-b-xs">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm no-borders" placeholder="Recherher">
                                            <span class="input-group-btn border-radius">
                                                <button style="" type="button" class="btn btn-sm bg-white b-white btn-icon">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            <section class="with-scroll scrollable wrapper w-f">
                                <div class="with-scroll table-panel">
                                    <div class="panel with-scroll table-panel animated zoomIn">
                                        <div class="panel-body">
                                            <div class="horizontal-scroll">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr class="panel">
                                                        <th class="browser-icons"></th>
                                                        <th>Nom</th>
                                                        <th>Prénoms</th>
                                                        <th>Email</th>
                                                        <th>Rôle(s)</th>
                                                        <th class="text-right">actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><img width="50" height="50" src="images/login-w-icon.png" class="img-circle b-a b-light b-3x" style="border-radius: 25px;"></td>
                                                        <td>
                                                            <strong>DEMBI</strong>
                                                        </td>
                                                        <td>
                                                            <strong>Adorand</strong>
                                                        </td>
                                                        <td>
                                                            <strong>merveilledembi@yahoo.fr</strong>
                                                        </td>
                                                        <td>
                                                            <strong>admin, caissier</strong>
                                                        </td>
                                                        <td class="text-right">
                                                            <button href="#" class=" b-2x btn btn-sm btn-default btn-rounded btn-icon active" data-toggle="tooltip" data-placement="left" data-title="Editer">
                                                                <i class="fa fa-edit text-white box-shadow"></i>
                                                            </button>
                                                            <button href="#" class="b-2x btn btn-sm bg-warning btn-rounded btn-icon active" data-toggle="tooltip" data-placement="top" data-title="Désactiver">
                                                                <i class="fa fa-user-secret text-white box-shadow"></i>
                                                            </button>
                                                            <button href="#" class="b-2x btn btn-sm bg-danger btn-rounded btn-icon active" data-toggle="tooltip" data-placement="bottom" data-title="Supprimer">
                                                                <i class="fa fa-user-times text-white box-shadow"></i>
                                                            </button>
                                                        </td>
                                                    </tr>



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <footer class="footer bg-template">
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
            <!--List of User-->

        </section>
    </section>
</section>