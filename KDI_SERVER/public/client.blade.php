<section class="hbox stretch panel">

    <aside class="aside-md bg-template-serveur panel">
        <section class="vbox">
            <header class="header clearfix bg b-b b-light">
                <form method="post">
                    <div class="input-group m-t-sm">
                        <input type="text" class="input-sm form-control" placeholder="Rechercher" id="searchnomclient" ng-model="searchnomclient">
                        <span class="input-group-btn">
                            <button class="btn btn-sm bg-template"  data-toggle="tooltip" data-placement="top" title="Ajouter un annonceur" ng-click="showModalAdd('client')">
                                <i class="fa fa-plus text-white"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </header>
            <section class="scrollable hover">
                <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none">
                    <a class="list-group-item card cursor-pointer" ng-repeat="client in clients | filter : { nom : searchnomclient } | orderBy:'-updated_at' track by $index" ng-click="viewelement('client',client)">
                        <strong class="text-white"> {{ client.nom }}</strong>
                    </a>
                </div>
            </section>
        </section>
    </aside>
    <section class="panel">
        <header class="header bg-template clearfix">
            <a class="btn btn-sm bg-templateblue" ng-click="showModalUpdate('client',clientview)">
                <i class="i i-pencil text-white"></i>
                <strong class="text-white">Editer</strong>
            </a>
        </header>
        <section class="vbox bg-template-serveur">
            <section class="scrollable ">
                <div class="wrapper-lg bg-template">
                    <div class="hbox">
                        <aside class="aside-md animated zoomIn">
                            <div class="text-center">
                                <img src="{{clientview.image}}" alt="..." style="width: 128px;height: 128px;" class="img-circle m-b card">
                                <div>Profil</div>
                                <div class="">
                                    <div class="progress progress-xs progress-striped active inline m-b-none bg-white" style="width:128px">
                                        <div class="progress-bar bg-templateblue" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                    </div>
                                </div>
                                <p>50%</p>
                            </div>
                        </aside>
                        <aside>
                            <p class="pull-right m-l inline animated">
                                <a href="#" class="btn btn-sm btn-icon btn-info rounded m-b">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-icon btn-primary rounded m-b">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-icon btn-danger rounded m-b">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </p>
                            <h3 class="font-bold m-b-none m-t-none text-white text-u-c animated rotateInDownRight">{{clientview.nom}}</h3>
                            <p class="animated fadeInRight">
                                <i class="fa fa-lg fa-circle-o text-white m-r-sm"></i>
                                <strong class="text-white fontpacifico">Informations</strong>
                            </p>
                            <ul class="nav nav-pills nav-stacked aside-lg animated fadeInDown">
                                <li class="bg-templateblue card animated rotateInUpLeft">
                                    <a href="#" class="font-bold">
                                        <i class="i i-phone m-r-sm"></i> {{clientview.phone}}
                                    </a>
                                </li>
                                <li class="bg-templateblue card animated rotateInDownRight">
                                    <a href="#" class="font-bold">
                                        <i class="i i-mail m-r-sm"></i> {{clientview.email}}
                                    </a>
                                </li>
                                <li class="bg-templateblue card animated zoomIn">
                                    <a href="#">
                                        <i class="i i-chat m-r-sm"></i> Activer / Desactiver
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <ul class="nav nav-tabs m-b-n-xxs bg-template">
                    <li class="active">
                        <a href="#demandes" target="_self" data-toggle="tab" class="m-l">
                            demandes <span class="badge bg-primary badge-sm m-l-xs"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#alertes" target="_self" data-toggle="tab">alertes</a>
                    </li>
                    <li>
                        <a href="#edit" target="_self" data-toggle="tab">Edit profile</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class=" tab-pane active " id="demandes">
                        <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                            <li class="list-group-item">
                                <a href="#" class="thumb-sm pull-left m-r-sm">
                                    <img src="images/a0.png" class="img-circle">
                                </a>
                                <a href="#" class="clear">
                                    <small class="pull-right">3 minuts ago</small>
                                    <strong class="block">Drew Wllon</strong>
                                    <small>Wellcome and play this web application template ...</small>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="thumb-sm pull-left m-r-sm">
                                    <img src="images/a1.png" class="img-circle">
                                </a>
                                <a href="#" class="clear">
                                    <small class="pull-right">1 hour ago</small>
                                    <strong class="block">Jonathan George</strong>
                                    <small>Morbi nec nunc condimentum...</small>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="thumb-sm pull-left m-r-sm">
                                    <img src="images/a2.png" class="img-circle">
                                </a>
                                <a href="#" class="clear">
                                    <small class="pull-right">2 hours ago</small>
                                    <strong class="block">Josh Long</strong>
                                    <small>Vestibulum ullamcorper sodales nisi nec...</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane wrapper-lg" id="alertes">
                        <div class="row m-b">
                            <div class="col-xs-6">
                                <small>Cell Phone</small>
                                <div class="text-lt font-bold">1243 0303 0333</div>
                            </div>
                            <div class="col-xs-6">
                                <small>Family Phone</small>
                                <div class="text-lt font-bold">+32(0) 3003 234 543</div>
                            </div>
                        </div>
                        <div class="row m-b">
                            <div class="col-xs-6">
                                <small>Reporter</small>
                                <div class="text-lt font-bold">Coch Jose</div>
                            </div>
                            <div class="col-xs-6">
                                <small>Manager</small>
                                <div class="text-lt font-bold">James Richo</div>
                            </div>
                        </div>
                        <div>
                            <small>Bio</small>
                            <div class="text-lt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque
                                quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales
                                nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. Phasellus at
                                ultricies neque, quis malesuada augue.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane wrapper-lg" id="edit">
                        <form class="form-horizontal" method="get">
                            <div class="form-group"><label class="col-sm-3 control-label">Name:</label>
                                <div class="col-sm-5"><input type="text" class="form-control"></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group"><label class="col-sm-3 control-label"
                                                           for="input-id-1">Email:</label>
                                <div class="col-sm-5"><input type="text" class="form-control" id="input-id-1"
                                                             disabled="disabled" value="drew.willon@scale.com"></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">Password:</label>
                                <div class="col-sm-5"><input type="password" class="form-control"></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">Password Again:</label>
                                <div class="col-sm-5"><input type="password" class="form-control"></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">Phone:</label>
                                <div class="col-sm-5"><input type="text" class="form-control"></div>
                            </div>
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group"><label class="col-sm-3 control-label">Bio:</label>
                                <div class="col-sm-5"><textarea class="form-control" rows="5"></textarea></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </section>
</section>