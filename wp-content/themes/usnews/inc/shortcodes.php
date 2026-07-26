<?php
/**
 * Shortcodes — expose homepage sections to Elementor Shortcode /
 * HTML widgets without redesigning markup.
 *
 * Usage:
 *   [usnews_home]              — full homepage body (hero + main)
 *   [usnews_section id="hero"] — single section (see map below)
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full homepage body (decision hero + <main> sections).
 *
 * @return string
 */
function usnews_shortcode_home() {
	ob_start();
	get_template_part( 'template-parts/home', 'main' );
	return ob_get_clean();
}
add_shortcode( 'usnews_home', 'usnews_shortcode_home' );

/**
 * Individual section shortcodes for Elementor section-by-section builds.
 *
 * Valid ids: hero, top-news, newsletters, feed, health, education,
 * photos, more-from, wire, app
 *
 * @param array $atts Shortcode attributes.
 * @return string
 */
function usnews_shortcode_section( $atts ) {
	$atts = shortcode_atts(
		array(
			'id' => '',
		),
		$atts,
		'usnews_section'
	);

	$id = sanitize_key( $atts['id'] );
	$map = array(
		'hero'        => 'section-hero',
		'top-news'    => 'section-top-news',
		'newsletters' => 'section-newsletters',
		'feed'        => 'section-feed',
		'health'      => 'section-health',
		'education'   => 'section-education',
		'photos'      => 'section-photos',
		'more-from'   => 'section-more-from',
		'wire'        => 'section-wire',
		'app'         => 'section-app',
	);

	if ( empty( $id ) || ! isset( $map[ $id ] ) ) {
		return '<!-- usnews_section: unknown id -->';
	}

	$slug = $map[ $id ];
	$path = get_template_directory() . '/template-parts/' . $slug . '.php';
	if ( ! file_exists( $path ) ) {
		// Fallback: full home when granular parts are not split yet.
		return usnews_shortcode_home();
	}

	ob_start();
	get_template_part( 'template-parts/' . $slug );
	return ob_get_clean();
}
add_shortcode( 'usnews_section', 'usnews_shortcode_section' );
