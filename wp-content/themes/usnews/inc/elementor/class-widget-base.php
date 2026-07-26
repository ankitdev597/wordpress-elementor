<?php
/**
 * Base Elementor widget for U.S. News sections.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class Widget_Base extends \Elementor\Widget_Base {

	/**
	 * Widget category.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'usnews' );
	}

	/**
	 * Keywords for search.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'usnews', 'news', 'homepage', 'landing' );
	}

	/**
	 * Default placeholder image URL.
	 *
	 * @return string
	 */
	protected function placeholder() {
		return 'https://placehold.co/1200x800';
	}

	/**
	 * Resolve image URL from media control.
	 *
	 * @param array  $settings Settings.
	 * @param string $key      Control key.
	 * @return string
	 */
	protected function img_url( $settings, $key ) {
		if ( ! empty( $settings[ $key ]['url'] ) ) {
			return $settings[ $key ]['url'];
		}
		return $this->placeholder();
	}

	/**
	 * Escape and print a link href (allow # anchors).
	 *
	 * @param string $url URL.
	 * @return string
	 */
	protected function href( $url ) {
		return esc_url( $url ? $url : '#' );
	}
}
