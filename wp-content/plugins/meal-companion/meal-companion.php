<?php

/*
	Plugin Name;Meal Companion
	Plugin URI:
	Description:Companion Plugin
	Version:1.0
	Author:Pallab
	Aurhor URI:
	License:
	Text Domain:meal-companion
	Domain Path:/language
*/
	function mealc_load_text_domain(){
		load_plugin_textdomain('meal-companiopn',false,dirname(__FILE__)."/language");
	}
add_action('plugin_loaded','mealc_load_text_domain');