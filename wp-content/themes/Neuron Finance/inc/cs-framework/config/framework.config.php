<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Theme Options',
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'neuron-theme-option',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Neuron  Theme <small>by Pallab</small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// Homepage  option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'homepage',
  'title'       => 'Homepage',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

    // begin: a field
    array(
      'id'      => 'enable_promo_title',
      'type'    => 'switcher',
      'title'   => 'Promo area title',
      'desc'   => 'Type Promo area title',
      'default'   => 'Welcome to the Neuron Finance',
    ),
    // end: a field
    array(
      'id'      => 'promo_title',
      'type'    => 'text',
      'title'   => 'Promo area title',
      'desc'   => 'Type Promo area title',
      'default'   => 'Welcome to the Neuron Finance',
      
      'dependency'=>array('enable_promo_title','==','true'),
    ),
    array(
      'id'      => 'promo_content',
      'type'    => 'textarea',
      'title'   => 'Promo area content',
      'desc'   => 'Type Promo area content',
      'default'   => 'Interactively simplify 24/7 markets through 24/7 best practices. Authoritatively foster cutting-edge manufactured products and distinctive.',
      'dependency'=>array('enable_promo_title','==','true'),
    ),
   // end: a field
      // begin: a field
      array(
        'id'      => 'enable_home_title',
        'type'    => 'switcher',
        'title'   => 'Promo area title',
        'desc'   => 'Type Promo area title',
        'default'   => 'Welcome to the Neuron Finance',
        
      ),
      // end: a field
   // begin: a field
   array(
    'id'      => 'home_title',
    'type'    => 'text',
    'title'   => 'Home area title',
    'desc'   => 'Type Home area title',
    'default'   => 'A Finance Agency Crafting Beautiful & Engaging Online Experiences',
     'dependency'=>array('enable_promo_title','==','true'),
  ),
  // end: a field

  array(
    'id'      => 'home_content',
    'type'    => 'textarea',
    'title'   => 'Home area content',
    'desc'   => 'Type Home area content',
    'dependency'=>array('enable_promo_title','==','true'),
  ),
    // end: a field
    array(
      'id'      => 'home_image',
      'type'    => 'image',
      'title'   => 'image',
      'desc'   => 'Upload image',
      'dependency'=>array('enable_promo_title','==','true'),
    ),
    // end: a field
  ) 
);

// ----------------------------------------
// Service section  options
// ----------------------------------------
$options[]      = array(
  'name'        => 'service',
  'title'       => 'Service',
  'icon'        => 'fa fa-home',

  // begin: fields
  'fields'      => array(

    // begin: a field
    array(
      'id'      => 'service_title',
      'type'    => 'text',
      'title'   => 'service area title',
      'desc'   => 'Type service area title',
      
    ),
    // end: a field

    array(
      'id'      => 'service_content',
      'type'    => 'textarea',
      'title'   => 'service area content',
      'desc'   => 'Type service area content',
    ),
   // end: a field
  ) 
);

CSFramework::instance( $settings, $options );
