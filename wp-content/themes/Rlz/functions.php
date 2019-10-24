<?php


//css and js file

function rlz_theme_file(){
    wp_enqueue_style('app-css',get_template_directory_uri().'/css/app.css', array(),'1.02','all');
    wp_enqueue_style('index-css',get_template_directory_uri().'/css/style-index-v=1.css', array(),'1.02','all');
    wp_enqueue_style('magnific-popup',get_template_directory_uri().'/css/magnific-popup.css', array(),'1.02','all');
    wp_enqueue_style('custom-css',get_template_directory_uri().'/css/custom.css', array(),'1.02','all');

    //Main css
    wp_enqueue_style('rlz-style',get_stylesheet_uri() );


    //js file
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );

    wp_enqueue_script('script-js',get_template_directory_uri().'/js/script.php-downsell_current_step=1&cbtoken=vifavlr8scdtbmoh3hjk7h1mv6.js', array('jquery'),'1.01', true);
    wp_enqueue_script('slick-js',get_template_directory_uri().'/js/slick.js', array('jquery'),'1.01', true);
    wp_enqueue_script('combo-js',get_template_directory_uri().'/js/combo.js', array('jquery'),'1.01', true);
    wp_enqueue_script('common-js',get_template_directory_uri().'/js/common.js', array('jquery'),'1.01', true);
    wp_enqueue_script('magnific-js',get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('script-mb-js',get_template_directory_uri().'/js/script-mobile.js', array('jquery'),'1.01', true);
    wp_enqueue_script('ref-js',get_template_directory_uri().'/js/ref.js', array('jquery'),'1.01', true);
    wp_enqueue_script('Adready-js',get_template_directory_uri().'/js/Adready.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('action-js',get_template_directory_uri().'/js/action.js', array('jquery'),'1.01', true);
   
}
add_action('wp_enqueue_scripts','rlz_theme_file');

//Shortcode
add_filter('widget_text','do_shortcode');
//Theme supportr

function rlz_theme_supports(){
    //loading text Domain
    load_theme_textdomain( 'rlz', get_template_directory() . '/languages' );
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
add_action('after_setup_theme','rlz_theme_supports');
