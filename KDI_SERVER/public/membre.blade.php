<section class="vbox">
    <section class=" wrapper scrollable">
        <div class="content-top clearfix" style="padding-right: 21px;padding-left: 21px;">
            <h1 class="al-title">MEMBRES</h1>
            <ul class="breadcrumb al-breadcrumb no-borders fontpacifico" >
                <li>
                    <a href="accueil.html" style="color: #209e91;text-decoration: none !important; transition: color 0.2s ease;">KDI BackEND</a></li>
                <li>MEMBRES</li>
            </ul>
        </div>
        <section class="hbox stretch panel">
            <!--List of User-->
            <aside class="no-padder">
                <section class="hbox stretch panel">

                    <aside class="aside-md panel dker b-r" id="viewtypeclients">

                        <div class="wrapper b-b header">Type de Clients
                            <button class="btn btn-sm bg-white btn-rounded btn-icon pull-right"  data-toggle="tooltip" data-placement="left" data-title="Ajouter une fonction" data-original-title="" title="" onclick="showModal('modal-addfonction')" style="margin-top: -5px;">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <ul class="nav scrollable animated zoomIn" style="max-height: 700px;">
                            <li class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.12);box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.5);"><a href="#" class="text-ellipsis"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Tous les clients</a></li>
                            <li class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.12);box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.5);"><a href="#" class="text-ellipsis"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Client fidèle</a></li>
                            <li class="" style="border-bottom: 1px solid rgba(0, 0, 0, 0.12);box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.5);"><a href="#" class="text-ellipsis"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Client simple</a></li>
                        </ul>
                    </aside>
                    <aside>
                        <section class="vbox">
                            <header class="header panel b-b clearfix">
                                <div class="row m-t-sm">
                                    <div class=" col-xs-7 col-sm-8 m-b-xs">
                                        <a href="#viewtypeclients" data-toggle="class:hide" class="btn btn-sm bg-template active">
                                            <i class="fa fa-caret-right text-white text fa-lg"></i>
                                            <i class="fa fa-caret-left text-white text-active fa-lg"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm typecmd_reg" title="Refresh"><i class="fa fa-refresh"></i></button>
                                            <button type="button" class="btn btn-sm typecmd_reg" title="Action groupée" data-toggle="dropdown"><i class="fa fa-filter"></i> <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Option 1</a></li>
                                                <li><a href="#">Option 2</a></li>
                                                <li><a href="#">Option 3</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Trier par</a></li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-sm bg-template" onclick="showModal('modal-addclient')" >
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    </div>
                                    <div class=" col-xs-5 col-sm-4 m-b-xs">
                                        <div class="input-group">
                                            <input type="text" class="input-sm form-control" placeholder="Rechercher">
                                            <span class="input-group-btn">
                                                                        <button class="btn btn-sm bg-white" type="button">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <section class="scrollable wrapper w-f">
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns " style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-info" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user-secret i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-info" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user-secret i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-info" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user-secret i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-template" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-template on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle typecmd_reg" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client typecmd_reg on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-3 m-t-lg on animated zoomIn client">
                                    <div class="thumbnail text-center panel ">
                                        <div class="row m-t-n-lg clientbtns" style="margin-top: -45px;">
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button" onclick="showModal('modal-addclient')">
                                                <i class="fa fa-users" data-toggle="tooltip" data-placement="top" data-title="Editer l'utilisateur"></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client-middle bg-info" type="button" style="box-shadow: inset 0 0 2px 1px rgba(255, 255, 255, 0.08), 0 18px 10px -5px rgba(0, 0, 0, 0.6);padding: 30px 35px;border-radius: 50%;">
                                                <i class="fa fa-user-secret i-2x" ></i>
                                            </button>
                                            <button  class="btn btn-sm btn-client bg-info on animated fadeIn" type="button">
                                                <i class="fa fa-user-times" data-toggle="tooltip" data-placement="top" data-title="Supprimer l'utilisateur"></i>
                                            </button>
                                        </div>
                                        <div class="caption">
                                            <p class="text-white text-ellipsis" data-toggle="tooltip" data-placement="top" data-title="N°: Mfndfl047110">N°: Mfndfl047110</p>
                                            <p class="text-white text-ellipsis m-b-none text-u-c text-u-l" data-toggle="tooltip" data-placement="top" data-title="Client 1"><strong>Client 1</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <footer class="footer bg-template">
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