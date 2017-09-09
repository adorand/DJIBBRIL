<!-- App -->



<section class="vbox stretch on animated fadeIn" >
    <header class="bg-templateblue header panel clearfix">
        <p class="h4 font-thin pull-left m-r m-b-sm font-bold">Surfaces</p>
        <button class="btn btn-sm bg-white btn-rounded btn-icon" ng-click="showModalAdd('Slider')" data-toggle="tooltip" data-placement="bottom" data-title="Ajouter un Slider"><i class="fa fa-plus"></i></button>
        <button class="m-l-sm btn btn-sm bg-white btn-rounded btn-icon" ng-click="trierElement('Publicite','')" data-toggle="tooltip" data-placement="bottom" data-title="Actualiser" ><i class="fa fa-refresh"></i></button>

        <div class="form-group m-t-sm m-b-n m-r pull-right">
            <div class="input-group">
                <input type="text" class="form-control input-sm no-border" placeholder="Rechercher un surface...">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-sm bg-white b-white btn-icon">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </header>
    <section class="scrollable wrapper" style="height: 100%;">
        <div class="row">
            <div class="col-md-12">
                <div class="row row-sm">
                    <div  class="col-xs-6 col-sm-4 col-md-2 slider on animated zoomIn">
                        <div class="thumbnail panel" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);">
                            <img src="images/p9.jpg" style="width:100%;height: 155px;" class="img-responsive" alt="">
                            <div class="caption">
                                <p class="text-ellipsis m-b-none">
                                    <strong class="text-white text-u-c text-left m-t">CITYDIA</strong>
                                    <span class="pull-right">
                                        <button class="btn btn-sm bg-white text-black btn-rounded btn-icon"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-sm bg-danger text-white btn-rounded btn-icon" data-toggle="tooltip" data-placement="right" data-title="Supprimer ce slider" ><i class="fa fa-trash-o"></i></button>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
