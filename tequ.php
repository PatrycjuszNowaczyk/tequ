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

// Includes
include('includes/activation.php');


// Hooks
register_activation_hook('__FILE__', 'tequ_activate_plugin');

//Shortcodes