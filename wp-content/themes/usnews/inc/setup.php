<?php
/**
 * Theme setup: supports, navigation menus, and content meta.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports and navigation locations.
 */
function usnews_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	// Elementor: allow full-width / canvas templates without theme chrome conflicts.
	add_theme_support( 'align-wide' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'usnews' ),
			'footer'  => __( 'Footer Utility', 'usnews' ),
		)
	);
}
add_action( 'after_setup_theme', 'usnews_setup' );

/**
 * Output meta tags matching the static source (theme-color + description).
 */
function usnews_meta_theme_color() {
	echo '<meta name="theme-color" content="#033493">' . "\n";
	echo '<meta name="description" content="' . esc_attr__( 'U.S. News & World Report: News, Rankings and Analysis on Politics, Education, Healthcare and More.', 'usnews' ) . '">' . "\n";
}
add_action( 'wp_head', 'usnews_meta_theme_color', 1 );
