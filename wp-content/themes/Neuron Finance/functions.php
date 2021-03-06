<?php


//css and js file

function neuron_theme_file(){
    wp_enqueue_style('animate-css',get_template_directory_uri().'/assets/css/animate.min.css', array(),'1.02','all');
    wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/fonts/font-awesome/css/font-awesome.min.css', array(),'1.02','all');
    wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(),'1.02','all');
    wp_enqueue_style('bootsnav',get_template_directory_uri().'/assets/css/bootsnav.css', array(),'1.02','all');
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css', array(),'1.02','all');

    //Main css
    wp_enqueue_style('neuron-style',get_stylesheet_uri() );

    wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('bootsnav-js',get_template_directory_uri().'/assets/js/bootsnav.js', array('jquery'),'1.01', true);
    wp_enqueue_script('owl-js',get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('wow-js',get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'),'1.01', true);
    wp_enqueue_script('ajaxchimp-js',get_template_directory_uri().'/assets/js/ajaxchimp.js', array('jquery'),'1.01', true);
    wp_enqueue_script('script-js',get_template_directory_uri().'/assets/js/script.js', array('jquery'),'1.01', true);
   
}
add_action('wp_enqueue_scripts','neuron_theme_file');
//Shortcode
add_filter('widget_text','do_shortcode');
//Theme supportr

function neuron_theme_supports(){
    //loading text Domain
    load_theme_textdomain( 'neuron', get_template_directory() . '/languages' );
    //Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
   // hard-coded <title> tag in the document head, and expect WordPress to
    add_theme_support( 'title-tag' );
    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
	add_image_size('neuron-blog-thum',740,520, true);
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'neuron' ),
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
add_action('after_setup_theme','neuron_theme_supports');


//Register Custom Post
function neuron_theme_custom_post(){
	register_post_type('slide',
		array(
			'labels'=> array(
				'name' =>__('Slide'),
				'singular_name'=>__("Slide")
			),
			'supports' => array(
				'title','editor','thumbnail','revisions','custom-fields','page-attributes'
			),
			'public'   =>__return_false(),
			'show_ui'  =>true
		)
	);
	register_post_type('feature',
		array(
			'labels'=> array(
				'name' =>__('Features'),
				'singular_name'=>__("Feature"),
				'all_items'  =>'Feature all item',
				'add_new'    =>'Add new feature',
				'add_new_item'=>'Add new feature item'

			),
			'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields', ),
			'public'   =>true,
			'show_ui'  =>true
		)
	);
	register_post_type('service',
		array(
			'labels'=> array(
				'name' =>__('Services'),
				'singular_name'=>__("Service")
			),
			'supports' => array('title','editor','thumbnail','revisions','custom-fields','page-attributes'),
			'public'   =>__return_false(),
			'show_ui'  =>true
		)
	);

	register_post_type('work',
		array(
			'labels'=> array(
				'name' =>__('work'),
				'singular_name'=>__("work"),
				'all_items'  =>'work all item',
				'add_new'    =>'Add new work',
				'add_new_item'=>'Add new work item'
			),
			'supports' => array('title','editor','thumbnail','revisions','page-attributes'),
			'public'   =>true,
			'show_ui'  =>true
		)
	);
}
add_action('init','neuron_theme_custom_post');

//Register widget
function neuron_widgets_init(){
	register_sidebar( array(
		'name'       =>esc_html('Footer one','neuron'),
		'id'         =>'footer-1',
		'description'=>esc_html__('Add Footer one widgets here','neuron'),
		'before_widget'=>'<div id="%1$s"  class="footer-widgets %2$s">',
		'after_widget' =>'</div>',
		'before_title'=>'<h3 class="widget-title">',
		'after_title' =>'</h3>',
	));
	register_sidebar( array(
		'name'       =>esc_html('Footer two','neuron'),
		'id'         =>'footer-2',
		'description'=>esc_html__('Add Footer two widgets here','neuron'),
		'before_widget'=>'<div id="%1$s"  class="footer-widgets %2$s">',
		'after_widget' =>'</div>',
		'before_title'=>'<h3 class="widget-title">',
		'after_title' =>'</h3>',
	));

	register_sidebar( array(
		'name'       =>esc_html('Footer three','neuron'),
		'id'         =>'footer-3',
		'description'=>esc_html__('Add Footer three widgets here','neuron'),
		'before_widget'=>'<div id="%1$s"  class="footer-widgets %2$s">',
		'after_widget' =>'</div>',
		'before_title'=>'<h3 class="widget-title">',
		'after_title' =>'</h3>',
	));
	register_sidebar( array(
		'name'       =>esc_html('Footer Four','neuron'),
		'id'         =>'footer-4',
		'description'=>esc_html__('Add Footer four widgets here','neuron'),
		'before_widget'=>'<div id="%1$s"  class="footer-widgets %2$s">',
		'after_widget' =>'</div>',
		'before_title'=>'<h3 class="widget-title">',
		'after_title' =>'</h3>',
	));
}
add_action('widgets_init','neuron_widgets_init');

//ShortCode Register

function thumbpost_list_shortcode($atts){
	extract( shortcode_atts( array(
		'count' => 3,
	),$atts));
	
	$q = new WP_Query(
		array(
			'posts_per_page' => $count,
			'post_type'     =>'post'
		)
	);
	
	$list ='<ul>';
	while($q->have_posts()) : $q->the_post();
	$id =get_the_ID();

		$list.= '
			<li>
				'.get_the_post_thumbnail($id, 'thumbnail').'
			    <p><a href="'.get_permalink().'">'.get_the_title().'</a></p>
				<span>'.get_the_date('d F Y',$id).'</span>
				
			</li> 
		';

	endwhile;
	$list.='</ul>';
	wp_reset_query();
	return $list;
}
add_shortcode('thumb_posts','thumbpost_list_shortcode');

/**
 * Custom Comment Walker template.
 */
include_once('inc/cs-framework/cs-framework.php');


if ( ! function_exists( 'neuron_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function neuron_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			/* translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'neuron' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
					'<span class="cat-links">%1$s</span>',
					get_the_category_list(''),
					
					$categories_list
				); 
			}

			
		}
		
	}
endif;