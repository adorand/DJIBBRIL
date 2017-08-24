<!DOCTYPE html>
<html lang="en" class=" ">
    <head>
        <meta charset="utf-8"/>
        <title ><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="description" content=""/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    </head>
    <body  data-spy=scroll data-target=#header>

        <?php wp_head(); ?>

        <!-- header -->
        <header id="header" class="navbar navbar-fixed-top bg-none dk" data-spy="affix" data-offset-top="2">
        <div class="container m-t m-b">
            <div class="col-sm-1 navbar-header dk" >
                <a href="index.php" class="navbar-brand m-t-xs  ">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/superette.png" class="" alt="scale">
                </a>
                <a class="pull-right btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                    <i class="fa fa-cog"></i>
                </a>
                <br/>
            </div>
            <div class="col-sm-11 m-t">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <div class="input-group m-t-xs box-shadow header-search cardhover">
                                <input type="search"  class="form-control input-sm no-borders" style="height: 100% !important;font-size:16px; ">
                                <span class="input-group-btn border-radius">
                                    <button type="button"  class="btn btn-sm bg-white b-white btn-icon" style="height: 100% !important;border: 1px solid rgba(255,255,255,0.1);">
                                        <a href="<?php echo esc_url( home_url( '/products-recherche.php' ) ); ?>" rel="home"><i class="fa fa-search text-primary"></i></a>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <ul class="nav navbar-nav hidden-xs nav-user user">
                            <li class=" hidden-xs active m-r">
                                <a href="#" class="dropdown-toggle text-black m-b-sm" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i> <span class="hidden-md hidden-sm ">CADDY</span>
                                    <span class="badge badge-sm up bg-danger count">2</span>
                                </a>
                                <section class="m-t-lg dropdown-menu aside-lg on animated fadeInUp" style="margin-left: -110%;">
                                    <span class="arrow top "></span>
                                    <div class="row m-l-none m-r-none m-t-n-xxs m-b text-center">
                                        <div class="row  m-t m-l-sm m-r-sm" style="padding: 0px 5px 0px 5px ;">
                                            <div class="pull-left">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                <span class="m-l-sm m-r">Laitcrans</span>
                                            </div>
                                            <div class="m-t-xs pull-right">
                                                <span><u>20000 Fcfa</u></span>
                                            </div>
                                        </div>
                                        <div class="row  m-t m-l-sm m-r-sm" style="padding: 0px 5px 0px 5px ;">
                                            <div class="pull-left">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                <span class="m-l-sm m-r">Laitcrans</span>
                                            </div>
                                            <div class="m-t-xs pull-right">
                                                <span><u>20000 Fcfa</u></span>
                                            </div>
                                        </div>
                                        <div class="row m-t m-l-sm m-r-sm" style="padding: 0px 5px 0px 5px ;">
                                            <div class="pull-left">
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                <span class="m-l-sm m-r">Laitcrans</span>
                                            </div>
                                            <div class="m-t-xs pull-right">
                                                <span><u>20000 Fcfa</u></span>
                                            </div>
                                        </div>
                                        <p class="text-center m-t-md ">
                                            <button type="button" class="btn bg-primary text-white card m-b-n" style="border:10px solid #177bbb;">
                                                <i class="fa fa-arrow-right"></i> <a href="livraison.php" class="text-white"><strong>VOIR DETAILS</strong></a>
                                            </button>
                                        </p>
                                    </div>
                                </section>
                            </li>
                            <li class="border-radius m-r m-t-n-xxs card border-card">
                                <a href="liste.php" class="bg-white border-radius">
                                    <strong class="text-u-l">Liste</strong>
                                </a>
                            </li>
                            <li class="border-radius m-r m-t-n-xxs card border-card">
                                <a href="historique.php" class="bg-white border-radius">
                                    <strong class="text-u-l">Historique</strong>
                                </a>
                            </li>
                            <li class=" dropdown active m-r">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="thumb avatar bg-gradient pull-left">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/a0.png"  class="dker" alt="...">
                                    </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animated fadeInRight">
                                    <li class="" style="cursor: pointer;">
                                        <a id="aff_sidebar_form" href="#sidebar_form" data-toggle="class:hide">Connexion</a>
                                    </li>
                                    <li>
                                        <a href="parametres.php">Paramètres</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- / header -->