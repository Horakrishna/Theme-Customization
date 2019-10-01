<?php

function meal_setup_theme(){
    load_textdomain('meal',get_template_directory()."/languages");
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5',array(
        'search-form',
        'comment-form',
        'gallery',
        'caption',
        'connemt-list'
    ));
    add_theme_support('custom-logo');

}
add_action('after_setup_theme','meal_setup_theme');

function meal_assets(){
    wp_enqueue_style('front',get_template_directory_uri().'//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700');
    wp_enqueue_style( 'meal-bootstrap.css', get_template_directory_uri().'/assets/css/bootstrap.css', null,'1.0');
    wp_enqueue_style( 'meal-animate.css', get_template_directory_uri().'/assets/css/animate.css', null,'1.0');
    wp_enqueue_style( 'meal-owl.carousel.min.css', get_template_directory_uri().'/assets/css/owl.carousel.min.css', null,'1.0');
    wp_enqueue_style( 'meal-magnific-popup.css', get_template_directory_uri().'/assets/css/magnific-popup.css', null,'1.0');
    wp_enqueue_style( 'meal-aos.css', get_template_directory_uri().'/assets/css/aos.css', null,'1.0');
    wp_enqueue_style( 'meal-bootstrap-datepicker.css', get_template_directory_uri().'/assets/css/bootstrap-datepicker.css', null,'1.0');
    wp_enqueue_style( 'meal-jquery.timepicker.css', get_template_directory_uri().'/assets/css/jquery.timepicker.css', null,'1.0');

    wp_enqueue_style( 'fontaosome', get_theme_file_uri('/assets/fonts/fontawesome/css/font-awesome.min.css'));
    wp_enqueue_style( 'ionicons', get_theme_file_uri('/assets/fonts/ionicons/css/ionicons.min.css'));
    wp_enqueue_style( 'flaticon', get_theme_file_uri('/assets/fonts/flaticon/font/flaticon.css'));

    wp_enqueue_style( 'meal-portfolio.css', get_template_directory_uri().'/assets/css/portfolio.css', null,'1.0');
    wp_enqueue_style( 'meal-style.css', get_template_directory_uri().'/assets/css/style.css', null,'1.0');


    wp_enqueue_script( 'meal-aos-js', get_template_directory_uri().'/assets/js/aos.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-bootstrap-datepicker-js', get_template_directory_uri().'/assets/js/bootstrap-datepicker.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-imagesloaded-js', get_template_directory_uri().'/assets/js/imagesloaded.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-isotope-min-js', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery-min-js', get_template_directory_uri().'/assets/js/jquery-3.2.1.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery-migrate-min-js', get_template_directory_uri().'/assets/js/jquery-migrate-3.0.1.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery-easing-js', get_template_directory_uri().'/assets/js/jquery.easing.1.3.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery-isotope-js', get_template_directory_uri().'/assets/js/jquery.isotope.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-magnific-popup-js', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery.stellar-js', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery.timepicker-js', get_template_directory_uri().'/assets/js/jquery.timepicker.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-jquery.waypoints-js', get_template_directory_uri().'/assets/js/jquery.waypoints.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-magnific-popup-options', get_template_directory_uri().'/assets/js/magnific-popup-options.js', array('jquery'),'1.0',true);
    wp_enqueue_script('google-map','//maps.googleapis.com/maps/api/js?key=AIzaSyAWT3Ulpwu7IvtE6coUdM3tDR5jYC6tCJ8',true,null);
    wp_enqueue_script( 'meal-main-js', get_template_directory_uri().'/assets/js/main.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-popper-js', get_template_directory_uri().'/assets/js/popper.min.js', array('jquery'),'1.0',true);
    wp_enqueue_script( 'meal-portfolio-js', get_template_directory_uri().'/assets/js/portfolio.js', array('jquery','meal-jquery-isotope-js','meal-magnific-popup-js'),'1.0',true);

}
add_action('wp_enqueue_scripts','meal_assets');