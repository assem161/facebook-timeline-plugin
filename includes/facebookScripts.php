<?php

function fc_widget() {
	wp_enqueue_style('s-fc-styles',plugins_url().'/facebook timeline page plugin/css/swstyle.css');
	wp_enqueue_script( 's-fc-mainjs', plugins_url() . '/facebook timeline page plugin/js/swmain.js', array('jquery'), true );

}
add_action( 'wp_enqueue_scripts', 'fc_widget' );