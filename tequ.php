<?php

/*
Plugin Name: Tequ
Description: Create simple tests on your wordpress pages
Version: 1.0
Author: Patrycjusz Nowaczyk
License: GPLv2 or later
Text Domain: tequ
*/




// prevent from direct calling this plugin
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


// Setup
define('TEQU_PLUGIN_URL', plugin_dir_url(__FILE__));


// Includes
include('includes/activation.php');
include('includes/init.php');
include('includes/show-test.php');
include('process/save-post.php');
include('includes/admin/edit-post-page.php');
include('includes/admin/enqueue-scripts.php');
// include('includes/admin/menus.php'); turned off
// include('includes/admin/options-page.php'); turned off


// Hooks
register_activation_hook('__FILE__', 'tequ_activate_plugin');
add_action('init', 'tequ_init');
add_action('save_post_test', 'tequ_save_post', 10 , 3);
add_action( 'edit_form_after_title', 'tequ_edit_post_page');
// add_action('admin_menu', 'tequ_admin_menu'); turned off
add_action('admin_enqueue_scripts', 'tequ_enqueue_scripts');

//Shortcodes
add_shortcode('tequ_test', 'tequ_show_test');