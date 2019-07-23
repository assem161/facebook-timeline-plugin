<?php
/*
Plugin Name: facebook timeline page plugin
Description: plugin to add facebook timeline page and control system
Author: assem Elshukfy
Version: 1.0
Author URI: http://assem.hostkda.com/?i=1#
*/


if(!defined('ABSPATH')){
	exit;
}

require_once(plugin_dir_path(__FILE__).'/includes/facebookScripts.php');

require_once(plugin_dir_path(__FILE__).'/includes/facebook_widget.php');


add_action( 'widgets_init', function(){
	register_widget( 'facebook_timeline' );
});

