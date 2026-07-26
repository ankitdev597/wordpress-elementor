<?php
/**
 * Ad slot widget.
 *
 * @package usnews
 */

namespace USNews\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Ad extends Widget_Base {

	public function get_name() {
		return 'usnews-ad';
	}

	public function get_title() {
		return __( 'USN · Ad Slot', 'usnews' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => __( 'Ad', 'usnews' ) ) );
		$this->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'usnews' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array( 'url' => $this->placeholder() ),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s   = $this->get_settings_for_display();
		$src = $this->img_url( $s, 'image' );
		?>
		<div class="ad-slot" aria-hidden="true">
			<img src="<?php echo esc_url( $src ); ?>" alt="" width="1200" height="800" loading="lazy">
		</div>
		<?php
	}
}
