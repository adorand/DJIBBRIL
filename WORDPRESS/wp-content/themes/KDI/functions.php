<?php 
    
    //REGISTER WIDGET AREAS
    if ( function_exists('register_sidebars') ) {
        register_sidebar(array(
            'name' => 'Footer Widget 1',
            'id' => 'footer1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="upper2 title3"><span>',
            'after_title' => '</span></h2>',
        ));
        register_sidebar(array(
            'name' => 'Footer Widget 2',
            'id' => 'footer2',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="upper2 title3"><span>',
            'after_title' => '</span></h2>',
        ));
        register_sidebar(array(
            'name' => 'Footer Widget 3',
            'id' => 'footer3',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="upper2 title3"><span>',
            'after_title' => '</span></h2>',
        ));
        register_sidebar(array(
            'name' => 'Footer Widget 4',
            'id' => 'footer4',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="upper2 title3"><span>',
            'after_title' => '</span></h2>',
        ));
    }
    

    function script_enqueue() {
        wp_enqueue_script( 'app-v1', get_template_directory_uri().'/js/app.v1.js');
        wp_enqueue_script( 'jquery-appear', get_template_directory_uri(). '/js/appear/jquery.appear.js');
        wp_enqueue_script( 'landing', get_template_directory_uri(). '/js/landing.js'); 
        wp_enqueue_script( 'plugin', get_template_directory_uri(). '/js/app.plugin.js');
        wp_enqueue_script( 'functions', get_template_directory_uri(). '/js/functions.js');
    }

    add_action('wp_footer', 'script_enqueue');
?>