<?php


//css and js file

function malemale_theme_file(){
    wp_enqueue_style('style-css',get_template_directory_uri().'/static/desktop_v3/css/style.css', array(),'1.02','all');
    wp_enqueue_style('default-css',get_template_directory_uri().'/static/desktop_v3/css/default.css', array(),'1.02','all');
    wp_enqueue_style('app-popup',get_template_directory_uri().'/static/desktop_v3/css/app.css', array(),'1.02','all');
    wp_enqueue_style('awesome-css',get_template_directory_uri().'/static/css/font-awesome.min.html', array(),'1.02','all');
    wp_enqueue_style('style_index-css',get_template_directory_uri().'/static/desktop_v3/css/style_index.css', array(),'1.02','all');
    

    //Main css
    wp_enqueue_style('male-style',get_stylesheet_uri() );


    //js file
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );

    wp_enqueue_script('viewportchecker-js',get_template_directory_uri().'/static/js/lib/jquery.viewportchecker.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('slick-js',get_template_directory_uri().'/static/desktop_v3/js/slick.js', array('jquery'),'1.01', true);
    wp_enqueue_script('mask-js',get_template_directory_uri().'/static/js/lib/jquery.mask.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('placeholders-js',get_template_directory_uri().'/static/js/lib/placeholders.js', array('jquery'),'1.01', true);
    wp_enqueue_script('html5-js',get_template_directory_uri().'/static/js/lib/html5.js', array('jquery'),'1.01', true);
    wp_enqueue_script('validate-mb-js',get_template_directory_uri().'/static/js/lib/jquery.validate.js', array('jquery'),'1.01', false);
    wp_enqueue_script('log_js_error-js',get_template_directory_uri().'/static/js/log_js_error.js', array('jquery'),'1.01', false);
    wp_enqueue_script('countries_states-js',get_template_directory_uri().'/static/js/countries_states/countries_states_en2350.js', array('jquery'),'1.01', true);
    wp_enqueue_script('countries_-js',get_template_directory_uri().'/static/js/countries_states_handler_v3.js', array('jquery'),'1.01', true);
    wp_enqueue_script('scripts-js',get_template_directory_uri().'/static/js/scripts.js', array('jquery'),'1.01', false);
    
   
}
add_action('wp_enqueue_scripts','malemale_theme_file');

//Shortcode
add_filter('widget_text','do_shortcode');
//Theme supportr

function male_theme_supports(){
    //loading text Domain
    load_theme_textdomain( 'male', get_template_directory() . '/languages' );
    //Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
   // hard-coded <title> tag in the document head, and expect WordPress to
    add_theme_support( 'title-tag' );
    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'rlz' ),
			)
    );
    	/*
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
        );
    
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
}
add_action('after_setup_theme','male_theme_supports');
