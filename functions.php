<?php

// LOAD CORE (if you remove this, the theme will break)
require_once( 'library/dsa504.php' );

function dsa504_boomshakalaka() {

  // launching operation cleanup
  add_action( 'init', 'dsa504_head_cleanup' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'dsa504_enqueue', 999 );


} 
// let's get this party started
add_action( 'after_setup_theme', 'dsa504_boomshakalaka' );

function dsa504_fonts() {
  wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
  wp_enqueue_style( 'googleFonts');
}


//add_action('wp_print_styles', 'pbOS_fonts');

add_action( 'admin_menu', 'remove_menu_pages', 999 );

function remove_menu_pages() {
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  //remove_menu_page( 'edit.php?post_type=page' );
  
};

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'DSA504 Theme Settings',
		'menu_title'	=> 'DSA504 Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
?>
