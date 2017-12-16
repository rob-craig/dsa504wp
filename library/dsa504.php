<?php

function dsa504_head_cleanup() {
	
	// CLEANIN TIME
	
	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	
	// **** REST API junk
	// Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

	// Emoji junk
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
	// Shortlink in header
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	
	// Remove Default Yoast microdata
	add_filter('wpseo_json_ld_output', '__return_true');
	
} 


/*********************
SCRIPTS & ENQUEUEING
*********************/

function dsa504_enqueue() {

  if (!is_admin()) {

		// register main stylesheet
		wp_register_style( 'dsa504-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

		//adding scripts file in the footer
		wp_register_script( 'dsa504-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );
		

		// enqueue styles and scripts
		wp_enqueue_style( 'dsa504-stylesheet' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'dsa504-js' );

	}
}

?>
