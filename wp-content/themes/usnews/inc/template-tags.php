<?php
/**
 * Template tags: reusable output helpers used by header/footer/templates.
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared wp_nav_menu() args (flat anchors — matches source markup).
 *
 * @param string $location Theme location.
 * @param array  $extra    Extra wp_nav_menu args.
 * @return array
 */
function usnews_nav_args( $location, $extra = array() ) {
	$defaults = array(
		'theme_location' => $location,
		'container'      => false,
		'items_wrap'     => '%3$s',
		'depth'          => 1,
		'fallback_cb'    => false,
		'walker'         => new USNews_Flat_Nav_Walker(),
	);
	return array_merge( $defaults, $extra );
}

/**
 * Source navigation items (used by both fallbacks).
 *
 * @return array<int,array{label:string,url:string}>
 */
function usnews_nav_items() {
	return array(
		array(
			'label' => __( 'News', 'usnews' ),
			'url'   => '#news',
		),
		array(
			'label' => __( 'Health', 'usnews' ),
			'url'   => '#health',
		),
		array(
			'label' => __( 'Education', 'usnews' ),
			'url'   => '#education',
		),
		array(
			'label' => __( 'Insurance', 'usnews' ),
			'url'   => '#more-from',
		),
		array(
			'label' => __( 'Autos', 'usnews' ),
			'url'   => '#more-from',
		),
		array(
			'label' => __( 'Money', 'usnews' ),
			'url'   => '#more-from',
		),
		array(
			'label' => __( 'Travel', 'usnews' ),
			'url'   => '#more-from',
		),
		array(
			'label' => __( 'Careers', 'usnews' ),
			'url'   => '#more-from',
		),
		array(
			'label' => __( 'Real Estate', 'usnews' ),
			'url'   => '#more-from',
		),
	);
}

/**
 * Fallback primary menu: exact source links when no menu is assigned.
 */
function usnews_primary_fallback() {
	$items = usnews_nav_items();
	echo '<nav class="nav-links" aria-label="' . esc_attr__( 'Primary', 'usnews' ) . '">';
	foreach ( $items as $item ) {
		printf( '<a href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) );
	}
	echo '</nav>';
}

/**
 * Fallback drawer menu (mobile) — items plus a Sign In link.
 */
function usnews_drawer_fallback() {
	$items   = usnews_nav_items();
	$items[] = array(
		'label' => __( 'Sign In', 'usnews' ),
		'url'   => '#footer',
	);
	foreach ( $items as $item ) {
		printf( '<a href="%s">%s</a>', esc_url( $item['url'] ), esc_html( $item['label'] ) );
	}
}

/**
 * Placeholder image helper (matches source placehold.co usage).
 *
 * @param string $alt   Alt text.
 * @param array  $attrs Extra attributes (loading, class, width, height, src…).
 */
function usnews_placeholder_img( $alt = '', $attrs = array() ) {
	$defaults = array(
		'src'    => 'https://placehold.co/1200x800',
		'alt'    => $alt,
		'width'  => 1200,
		'height' => 800,
	);
	$attrs = array_merge( $defaults, $attrs );

	$html = '<img';
	foreach ( $attrs as $key => $val ) {
		if ( '' === $val || null === $val ) {
			continue;
		}
		$html .= ' ' . esc_attr( $key ) . '="' . esc_attr( $val ) . '"';
	}
	$html .= '>';

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- each attribute escaped above.
}
