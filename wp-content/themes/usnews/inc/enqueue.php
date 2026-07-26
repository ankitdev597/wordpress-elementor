<?php
/**
 * Asset enqueue: styles and scripts in the exact cascade order of the
 * original build (fonts → tokens → base → header → sections → footer).
 *
 * @package usnews
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme styles and the deferred behavior script.
 *
 * The dependency chain ($prev) guarantees deterministic load order.
 */
function usnews_assets() {
	// Keep Elementor editor lightweight / stable.
	if ( isset( $_GET['action'] ) && 'elementor' === $_GET['action'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}
	if ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->editor && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
		// Still load CSS for canvas preview, but avoid aggressive JS in editor iframe.
	}

	$styles = array(
		'usnews-fonts'     => 'assets/css/css2.css',
		'usnews-variables' => 'assets/css/variables.css',
		'usnews-base'      => 'assets/css/base.css',
		'usnews-header'    => 'assets/css/header.css',
		'usnews-sections'  => 'assets/css/sections.css',
		'usnews-footer'    => 'assets/css/footer.css',
	);

	$prev = array();
	foreach ( $styles as $handle => $rel ) {
		$path = USNEWS_DIR . '/' . $rel;
		$ver  = file_exists( $path ) ? (string) filemtime( $path ) : USNEWS_VERSION;
		wp_enqueue_style( $handle, USNEWS_URI . '/' . $rel, $prev, $ver );
		$prev = array( $handle );
	}

	wp_enqueue_style( 'usnews-style', get_stylesheet_uri(), array( 'usnews-footer' ), USNEWS_VERSION );

	// Skip theme JS inside Elementor editor UI (not the preview iframe).
	if ( is_admin() ) {
		return;
	}

	$js_path = USNEWS_DIR . '/assets/js/main.js';
	$js_ver  = file_exists( $js_path ) ? (string) filemtime( $js_path ) : USNEWS_VERSION;
	wp_enqueue_script( 'usnews-main', USNEWS_URI . '/assets/js/main.js', array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'usnews_assets' );

/**
 * Preserve the original `defer` attribute on the main script.
 *
 * @param string $tag    The script tag HTML.
 * @param string $handle Script handle.
 * @return string
 */
function usnews_defer_main( $tag, $handle ) {
	if ( 'usnews-main' === $handle && false === strpos( $tag, ' defer' ) ) {
		$tag = str_replace( ' src', ' defer src', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'usnews_defer_main', 10, 2 );
